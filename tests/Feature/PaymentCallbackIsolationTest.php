<?php

namespace Tests\Feature;

use App\Http\Controllers\PayController;
use App\Models\BankPayment;
use App\Models\Payment;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use RuntimeException;
use Tests\TestCase;

final class PaymentCallbackIsolationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');
        DB::purge('sqlite');

        Schema::connection('sqlite')->create('users', function (Blueprint $table): void {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('products', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('orders', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_seller_id')->nullable();
            $table->integer('payment')->default(0);
            $table->string('status')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('payments', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->string('transactionId')->nullable();
            $table->string('driver')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('bank_payments', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->unsignedInteger('price');
            $table->integer('status')->default(0);
            $table->string('gift_code')->nullable();
            $table->unsignedBigInteger('gift_applied')->default(0);
            $table->string('gateway_reference')->nullable();
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('gifts', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('code');
            $table->integer('type')->default(0);
            $table->date('date_expire')->nullable();
            $table->unsignedBigInteger('value_price')->default(0);
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('notifications', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('type');
            $table->string('text');
            $table->integer('sms')->nullable();
            $table->integer('email')->nullable();
            $table->integer('system')->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Synthetic admin'],
            ['id' => 9, 'name' => 'Synthetic seller'],
            ['id' => 17, 'name' => 'Synthetic customer'],
        ]);
        DB::table('products')->insert(['id' => 5, 'title' => 'Synthetic product']);
    }

    public function test_fake_verified_callback_fulfills_only_once_even_with_two_pending_attempts(): void
    {
        $this->seedOrder();
        BankPayment::create(['user_id' => 17, 'order_number' => 'TEST-ORDER', 'price' => 1200]);
        BankPayment::create(['user_id' => 17, 'order_number' => 'TEST-ORDER', 'price' => 1200]);
        $provider = new FakeVerifiedPayController;
        request()->merge(['Authority' => 'TEST-AUTHORITY']);

        $this->assertSame(route('profile.index'), $provider->callback()->getTargetUrl());

        $this->assertSame(1, $provider->verifyCalls);
        $this->assertDatabaseHas('payments', ['order_number' => 'TEST-ORDER', 'status' => 1]);
        $this->assertDatabaseHas('orders', [
            'order_number' => 'TEST-ORDER', 'payment' => 1,
            'status' => 'paid', 'transaction_id' => 'FAKE-REFERENCE',
        ]);
        $this->assertDatabaseCount('notifications', 3);
        $this->assertDatabaseCount('bank_payments', 2);

        $this->assertSame(route('home.index'), $provider->callback()->getTargetUrl());

        $this->assertSame(1, $provider->verifyCalls, 'Replay must not re-verify an already finalized payment.');
        $this->assertDatabaseCount('notifications', 3);
        $this->assertSame(1, DB::table('bank_payments')->where('status', 1)->count());
    }

    public function test_fake_gateway_failure_does_not_fulfill_orders_or_send_notifications(): void
    {
        $this->seedOrder();
        BankPayment::create(['user_id' => 17, 'order_number' => 'TEST-ORDER', 'price' => 1200]);
        $provider = new FakeVerifiedPayController;
        $provider->failVerification = true;
        request()->merge(['Authority' => 'TEST-AUTHORITY']);

        $this->assertSame(route('home.index'), $provider->callback()->getTargetUrl());

        $this->assertSame(1, $provider->verifyCalls);
        $this->assertDatabaseHas('orders', ['order_number' => 'TEST-ORDER', 'payment' => 0]);
        $this->assertDatabaseHas('payments', ['order_number' => 'TEST-ORDER', 'status' => 0]);
        $this->assertDatabaseHas('bank_payments', ['order_number' => 'TEST-ORDER', 'status' => 0]);
        $this->assertDatabaseCount('notifications', 0);
    }

    public function test_verified_transaction_without_order_is_not_marked_paid(): void
    {
        Payment::create([
            'user_id' => 17, 'order_number' => 'MISSING', 'transactionId' => 'TEST-AUTHORITY',
        ]);
        BankPayment::create(['user_id' => 17, 'order_number' => 'MISSING', 'price' => 1200]);
        request()->merge(['Authority' => 'TEST-AUTHORITY']);

        $this->assertSame(route('home.index'), (new FakeVerifiedPayController)->callback()->getTargetUrl());

        $this->assertDatabaseHas('payments', ['order_number' => 'MISSING', 'status' => 0]);
        $this->assertDatabaseHas('bank_payments', [
            'order_number' => 'MISSING', 'status' => 'reconciliation_required',
            'gateway_reference' => 'FAKE-REFERENCE',
        ]);
        $this->assertDatabaseCount('notifications', 0);
    }

    public function test_fake_verified_callback_debits_gift_exactly_once(): void
    {
        $this->seedOrder();
        DB::table('gifts')->insert(['code' => 'GIFT-TEST', 'type' => 0, 'value_price' => 900]);
        BankPayment::create([
            'user_id' => 17, 'order_number' => 'TEST-ORDER', 'price' => 700,
            'gift_code' => 'GIFT-TEST', 'gift_applied' => 500,
        ]);
        $provider = new FakeVerifiedPayController;
        request()->merge(['Authority' => 'TEST-AUTHORITY']);

        $provider->callback();
        $this->assertDatabaseHas('gifts', ['code' => 'GIFT-TEST', 'value_price' => 400]);
        $this->assertDatabaseHas('gifts', ['code' => 'GIFT-TEST', 'user_id' => 17, 'type' => 1]);
        $this->assertDatabaseHas('orders', ['order_number' => 'TEST-ORDER', 'payment' => 1]);

        $provider->callback();
        $this->assertSame(1, $provider->verifyCalls);
        $this->assertDatabaseHas('gifts', ['code' => 'GIFT-TEST', 'value_price' => 400]);
        $this->assertDatabaseCount('notifications', 3);
    }

    public function test_fake_gateway_rejection_preserves_gift_balance(): void
    {
        $this->seedOrder();
        DB::table('gifts')->insert(['code' => 'GIFT-TEST', 'type' => 0, 'value_price' => 900]);
        BankPayment::create([
            'user_id' => 17, 'order_number' => 'TEST-ORDER', 'price' => 700,
            'gift_code' => 'GIFT-TEST', 'gift_applied' => 500,
        ]);
        $provider = new FakeVerifiedPayController;
        $provider->failVerification = true;
        request()->merge(['Authority' => 'TEST-AUTHORITY']);

        $provider->callback();

        $this->assertDatabaseHas('gifts', ['code' => 'GIFT-TEST', 'value_price' => 900]);
        $this->assertDatabaseHas('bank_payments', ['order_number' => 'TEST-ORDER', 'status' => 0]);
        $this->assertDatabaseCount('notifications', 0);
    }

    public function test_insufficient_reserved_gift_credit_blocks_fulfillment_for_reconciliation(): void
    {
        $this->seedOrder();
        DB::table('gifts')->insert(['code' => 'GIFT-TEST', 'type' => 0, 'value_price' => 100]);
        BankPayment::create([
            'user_id' => 17, 'order_number' => 'TEST-ORDER', 'price' => 700,
            'gift_code' => 'GIFT-TEST', 'gift_applied' => 500,
        ]);
        request()->merge(['Authority' => 'TEST-AUTHORITY']);

        (new FakeVerifiedPayController)->callback();

        $this->assertDatabaseHas('gifts', ['code' => 'GIFT-TEST', 'value_price' => 100]);
        $this->assertDatabaseHas('orders', ['order_number' => 'TEST-ORDER', 'payment' => 0]);
        $this->assertDatabaseHas('bank_payments', [
            'order_number' => 'TEST-ORDER', 'status' => 'reconciliation_required',
            'gateway_reference' => 'FAKE-REFERENCE',
        ]);
        $this->assertDatabaseCount('notifications', 0);
    }

    private function seedOrder(): void
    {
        DB::table('orders')->insert([
            'user_id' => 17,
            'order_number' => 'TEST-ORDER',
            'product_id' => 5,
            'product_seller_id' => 9,
            'payment' => 0,
        ]);
        Payment::create([
            'user_id' => 17, 'order_number' => 'TEST-ORDER', 'transactionId' => 'TEST-AUTHORITY',
        ]);
    }
}

final class FakeVerifiedPayController extends PayController
{
    public int $verifyCalls = 0;

    public bool $failVerification = false;

    protected function verifyTransaction(Payment $payment, BankPayment $bank, string $transactionId): string
    {
        $this->verifyCalls++;

        if ($this->failVerification) {
            throw new RuntimeException('Synthetic gateway rejected the test transaction.');
        }

        return 'FAKE-REFERENCE';
    }
}
