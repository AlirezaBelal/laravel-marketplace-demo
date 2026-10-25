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
            $table->timestamps();
        });
        Schema::connection('sqlite')->create('payments', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->integer('type_payment')->default(0);
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

    private function customer(int $id): User
    {
        $user = new User;
        $user->id = $id;

        return $user;
    }
}
