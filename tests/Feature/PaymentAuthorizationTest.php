<?php

namespace Tests\Feature;

use App\Http\Livewire\Home\Order\Payment as PaymentComponent;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

final class PaymentAuthorizationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');
        DB::purge('sqlite');

        Schema::connection('sqlite')->create('orders', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->unsignedBigInteger('total_discount_price')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('payments', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->integer('type_payment')->default(0);
            $table->unsignedBigInteger('shipping_price')->default(0);
            $table->string('discount_code')->nullable();
            $table->string('gift_code')->nullable();
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('bank_payments', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->unsignedBigInteger('price');
            $table->integer('status')->default(0);
            $table->string('gift_code')->nullable();
            $table->unsignedBigInteger('gift_applied')->default(0);
            $table->string('gateway_reference')->nullable();
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('return_orders', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('discounts', function (Blueprint $table): void {
            $table->id();
            $table->string('code');
            $table->integer('type');
            $table->unsignedBigInteger('price')->default(0);
            $table->integer('percent')->default(0);
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
    }

    public function test_customer_cannot_change_another_customers_payment_method(): void
    {
        $other = Payment::create(['user_id' => 99, 'order_number' => 'OTHER-ORDER', 'type_payment' => 0]);
        $this->actingAs($this->customer(17));

        (new PaymentComponent)->paymentTypeInternet('OTHER-ORDER');

        $this->assertSame(0, (int) $other->fresh()->type_payment);
    }

    public function test_customer_can_change_their_own_payment_method(): void
    {
        $own = Payment::create(['user_id' => 17, 'order_number' => 'OWN-ORDER', 'type_payment' => 0]);
        $this->actingAs($this->customer(17));

        (new PaymentComponent)->paymentTypeInternet('OWN-ORDER');
        $this->assertSame(1, (int) $own->fresh()->type_payment);

        (new PaymentComponent)->paymentTypeManual('OWN-ORDER');
        $this->assertSame(0, (int) $own->fresh()->type_payment);
    }

    public function test_customer_cannot_finalize_someone_elses_order(): void
    {
        Payment::create(['user_id' => 99, 'order_number' => 'OTHER-ORDER']);
        DB::table('orders')->insert([
            'user_id' => 99,
            'order_number' => 'OTHER-ORDER',
            'total_discount_price' => 1000,
        ]);
        $this->actingAs($this->customer(17));

        $this->expectException(NotFoundHttpException::class);
        (new PaymentComponent)->continuePayment('OTHER-ORDER');
    }

    public function test_final_amount_ignores_mutable_livewire_discount_values(): void
    {
        DB::table('orders')->insert([
            'user_id' => 17,
            'order_number' => 'OWN-ORDER',
            'total_discount_price' => 1000,
        ]);
        Payment::create([
            'user_id' => 17,
            'order_number' => 'OWN-ORDER',
            'shipping_price' => 200,
        ]);
        $this->actingAs($this->customer(17));

        $component = new PaymentComponent;
        $component->discount_type = 1;
        $component->discount_price = 50000;
        $component->dTotalPercent = -10000;
        $component->dgift = 10000;
        $component->continuePayment('OWN-ORDER');

        $this->assertDatabaseHas('bank_payments', [
            'user_id' => 17,
            'order_number' => 'OWN-ORDER',
            'price' => 1200,
        ]);
    }

    public function test_discount_is_recomputed_using_the_saved_voucher(): void
    {
        DB::table('orders')->insert([
            'user_id' => 17,
            'order_number' => 'OWN-DISCOUNT',
            'total_discount_price' => 1000,
        ]);
        DB::table('discounts')->insert(['code' => 'VALID', 'type' => 0, 'percent' => 25]);
        Payment::create([
            'user_id' => 17,
            'order_number' => 'OWN-DISCOUNT',
            'shipping_price' => 200,
            'discount_code' => 'VALID',
        ]);
        $this->actingAs($this->customer(17));

        (new PaymentComponent)->continuePayment('OWN-DISCOUNT');

        $this->assertDatabaseHas('bank_payments', [
            'order_number' => 'OWN-DISCOUNT',
            'price' => 950,
        ]);
    }

    public function test_gift_credit_is_only_snapshotted_before_gateway_verification(): void
    {
        DB::table('orders')->insert([
            'user_id' => 17, 'order_number' => 'GIFT-ORDER', 'total_discount_price' => 1000,
        ]);
        DB::table('gifts')->insert(['code' => 'TEST-GIFT', 'type' => 0, 'value_price' => 500]);
        Payment::create([
            'user_id' => 17, 'order_number' => 'GIFT-ORDER',
            'shipping_price' => 200, 'gift_code' => 'TEST-GIFT',
        ]);
        $this->actingAs($this->customer(17));

        (new PaymentComponent)->continuePayment('GIFT-ORDER');

        $this->assertDatabaseHas('bank_payments', [
            'order_number' => 'GIFT-ORDER', 'price' => 700,
            'gift_code' => 'TEST-GIFT', 'gift_applied' => 500, 'status' => 0,
        ]);
        $this->assertDatabaseHas('gifts', ['code' => 'TEST-GIFT', 'value_price' => 500]);
    }

    public function test_customer_can_pay_using_a_gift_claimed_to_their_account(): void
    {
        $this->orderWithGift('OWN-CLAIMED', 17, 'CLAIMED-GIFT');
        DB::table('gifts')->insert([
            'code' => 'CLAIMED-GIFT', 'type' => 1, 'user_id' => 17, 'value_price' => 400,
        ]);
        $this->actingAs($this->customer(17));

        (new PaymentComponent)->continuePayment('OWN-CLAIMED');

        $this->assertDatabaseHas('bank_payments', [
            'order_number' => 'OWN-CLAIMED', 'price' => 800,
            'gift_code' => 'CLAIMED-GIFT', 'gift_applied' => 400,
        ]);
    }

    public function test_claimed_gift_cannot_be_spent_by_a_different_customer(): void
    {
        $this->orderWithGift('OTHER-CLAIMED', 17, 'CLAIMED-GIFT');
        DB::table('gifts')->insert([
            'code' => 'CLAIMED-GIFT', 'type' => 1, 'user_id' => 99, 'value_price' => 400,
        ]);
        $this->actingAs($this->customer(17));

        (new PaymentComponent)->continuePayment('OTHER-CLAIMED');

        $this->assertDatabaseHas('bank_payments', [
            'order_number' => 'OTHER-CLAIMED', 'price' => 1200,
            'gift_code' => null, 'gift_applied' => 0,
        ]);
    }

    public function test_expired_gift_does_not_discount_the_payment(): void
    {
        $this->orderWithGift('EXPIRED-GIFT-ORDER', 17, 'EXPIRED-GIFT');
        DB::table('gifts')->insert([
            'code' => 'EXPIRED-GIFT', 'type' => 0, 'value_price' => 400,
            'date_expire' => today()->subDay()->toDateString(),
        ]);
        $this->actingAs($this->customer(17));

        (new PaymentComponent)->continuePayment('EXPIRED-GIFT-ORDER');

        $this->assertDatabaseHas('bank_payments', [
            'order_number' => 'EXPIRED-GIFT-ORDER', 'price' => 1200, 'gift_applied' => 0,
        ]);
    }

    private function orderWithGift(string $orderNumber, int $userId, string $giftCode): void
    {
        DB::table('orders')->insert([
            'user_id' => $userId, 'order_number' => $orderNumber, 'total_discount_price' => 1000,
        ]);
        Payment::create([
            'user_id' => $userId, 'order_number' => $orderNumber,
            'shipping_price' => 200, 'gift_code' => $giftCode,
        ]);
    }

    private function customer(int $id): User
    {
        $user = new User;
        $user->id = $id;

        return $user;
    }
}
