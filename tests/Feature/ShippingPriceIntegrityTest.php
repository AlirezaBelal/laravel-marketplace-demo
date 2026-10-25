<?php

namespace Tests\Feature;

use App\Http\Livewire\Home\Order\Shipping;
use App\Models\Address;
use App\Models\AddressTime;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

final class ShippingPriceIntegrityTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');
        DB::purge('sqlite');

        Schema::create('address_times', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('price');
            $table->timestamps();
        });
        Schema::create('addresses', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->boolean('payment')->default(false);
            $table->unsignedBigInteger('total_discount_price');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->timestamps();
        });
        Schema::create('payments', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');
            $table->string('order_number');
            $table->unsignedBigInteger('total_price');
            $table->unsignedBigInteger('shipping_price');
            $table->unsignedBigInteger('time_id');
            $table->timestamps();
        });
        Schema::create('carts', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('type')->default(0);
            $table->timestamps();
        });
    }

    public function test_shipping_amount_is_calculated_from_owned_orders_and_server_side_time_price(): void
    {
        $user = new User;
        $user->id = 17;
        $this->actingAs($user);

        Address::create(['user_id' => 17]);
        $time = AddressTime::create(['price' => 200]);
        $mine = Order::create([
            'user_id' => 17,
            'order_number' => 'OWN-ORDER',
            'payment' => 0,
            'total_discount_price' => 1000,
        ]);
        $other = Order::create([
            'user_id' => 99,
            'order_number' => 'OTHER-ORDER',
            'payment' => 0,
            'total_discount_price' => 9000,
        ]);

        $shipping = new Shipping;
        $shipping->shippingId($time->id);
        $shipping->dPrice = -9000; // A mutable Livewire property is not a price authority.
        $shipping->orders = collect([$other]); // Nor is a client-hydrated collection.
        $shipping->addToPayment();

        $this->assertDatabaseHas('payments', [
            'user_id' => 17,
            'order_id' => $mine->id,
            'total_price' => 1200,
            'shipping_price' => 200,
            'time_id' => $time->id,
        ]);
        $this->assertDatabaseCount('payments', 1);
        $this->assertDatabaseHas('orders', ['id' => $other->id, 'address_id' => null]);
    }
}
