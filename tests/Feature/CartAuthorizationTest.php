<?php

namespace Tests\Feature;

use App\Http\Livewire\Home\Cart\Index as CartIndex;
use App\Http\Livewire\Home\Product\Index as ProductIndex;
use App\Models\Cart;
use App\Models\ProductSeller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

final class CartAuthorizationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');
        DB::purge('sqlite');

        Schema::connection('sqlite')->create('carts', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->unsignedBigInteger('product_seller_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('product_vendor')->nullable();
            $table->unsignedBigInteger('product_color')->nullable();
            $table->unsignedBigInteger('product_warranty')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_price_discount')->nullable();
            $table->unsignedInteger('count')->default(1);
            $table->unsignedInteger('type')->default(0);
            $table->timestamps();
        });

        Schema::connection('sqlite')->create('product_sellers', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('warranty_id')->nullable();
            $table->unsignedInteger('product_count')->default(10);
            $table->unsignedInteger('limit_order')->default(10);
            $table->string('price')->default('1200');
            $table->string('discount_price')->default('1000');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function test_a_customer_cannot_mutate_another_customers_cart_by_id(): void
    {
        $foreignCart = Cart::create([
            'user_id' => 99,
            'ip' => '127.0.0.1',
            'count' => 2,
            'type' => 1,
        ]);
        $this->actingAs($this->customer(17));

        $cart = new CartIndex;
        foreach ([
            fn () => $cart->deleteCartProduct($foreignCart->id),
            fn () => $cart->addToCartFromCartOther($foreignCart->id),
            fn () => $cart->addToCartOtherFromCart($foreignCart->id),
            fn () => $cart->addToCount($foreignCart->id),
            fn () => $cart->minToCount($foreignCart->id),
        ] as $mutation) {
            try {
                $mutation();
                $this->fail('Another customer\'s cart must not be accessible by ID.');
            } catch (ModelNotFoundException) {
                // This is the expected authorization boundary.
            }
        }

        $this->assertDatabaseHas('carts', [
            'id' => $foreignCart->id,
            'user_id' => 99,
            'count' => 2,
            'type' => 1,
        ]);
    }

    public function test_an_anonymous_visitor_cannot_edit_an_account_cart_from_same_ip(): void
    {
        $cart = Cart::create(['user_id' => 99, 'ip' => '127.0.0.1']);

        $this->expectException(ModelNotFoundException::class);
        (new CartIndex)->deleteCartProduct($cart->id);
    }

    public function test_add_to_cart_does_not_increment_another_accounts_item(): void
    {
        $seller = ProductSeller::create([
            'product_id' => 5,
            'vendor_id' => 9,
            'price' => '1200',
            'discount_price' => '1000',
        ]);
        $foreignCart = Cart::create([
            'user_id' => 99,
            'ip' => '127.0.0.1',
            'product_seller_id' => $seller->id,
            'count' => 4,
        ]);
        $this->actingAs($this->customer(17));

        (new ProductIndex)->addToCart($seller->id);

        $this->assertDatabaseHas('carts', ['id' => $foreignCart->id, 'user_id' => 99, 'count' => 4]);
        $this->assertDatabaseHas('carts', [
            'user_id' => 17,
            'product_seller_id' => $seller->id,
            'count' => 1,
        ]);
        $this->assertDatabaseCount('carts', 2);
    }

    private function customer(int $id): User
    {
        $user = new User;
        $user->id = $id;

        return $user;
    }
}
