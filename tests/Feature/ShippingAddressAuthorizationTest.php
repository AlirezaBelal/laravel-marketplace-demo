<?php

namespace Tests\Feature;

use App\Http\Livewire\Home\Order\Shipping;
use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

final class ShippingAddressAuthorizationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // The historical migrations contain duplicate table definitions. Isolate
        // this ownership contract from unrelated migration compatibility work.
        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');
        DB::purge('sqlite');

        Schema::connection('sqlite')->create('addresses', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            foreach (['name', 'lname', 'address', 'mobile', 'vahed', 'code_posti', 'bld_num', 'city', 'state'] as $column) {
                $table->string($column)->nullable();
            }
            $table->timestamps();
        });
    }

    public function test_guest_cannot_create_or_delete_shipping_addresses(): void
    {
        $this->post(route('address.shipping.create'), ['name' => 'Guest'])
            ->assertRedirect(route('login'));

        $this->delete(route('address.shipping.delete', ['id' => 1]))
            ->assertRedirect(route('login'));

        $this->assertDatabaseCount('addresses', 0);
    }

    public function test_address_creation_uses_authenticated_owner_not_submitted_user_id(): void
    {
        $this->actingAs($this->customer(17));

        $this->post(route('address.shipping.create'), [
            'name' => 'Customer',
            'address' => 'Shipping address',
            'user_id' => 99,
        ])->assertRedirect();

        $this->assertDatabaseHas('addresses', [
            'name' => 'Customer',
            'user_id' => 17,
        ]);
    }

    public function test_customer_can_delete_own_address_but_not_another_customers(): void
    {
        $otherAddress = Address::create(['user_id' => 99, 'name' => 'Other']);
        $ownAddress = Address::create(['user_id' => 17, 'name' => 'Mine']);
        $this->actingAs($this->customer(17));

        $this->delete(route('address.shipping.delete', ['id' => $otherAddress->id]))
            ->assertNotFound();
        $this->assertDatabaseHas('addresses', ['id' => $otherAddress->id]);

        $this->delete(route('address.shipping.delete', ['id' => $ownAddress->id]))
            ->assertRedirect();
        $this->assertDatabaseMissing('addresses', ['id' => $ownAddress->id]);
    }

    public function test_livewire_checkout_rejects_another_customers_address(): void
    {
        $otherAddress = Address::create(['user_id' => 99, 'name' => 'Other']);
        $this->actingAs($this->customer(17));

        $this->expectException(ModelNotFoundException::class);
        (new Shipping)->checkout_address($otherAddress->id);
    }

    public function test_livewire_address_deletion_is_limited_to_the_current_customer(): void
    {
        $otherAddress = Address::create(['user_id' => 99, 'name' => 'Other']);
        $ownAddress = Address::create(['user_id' => 17, 'name' => 'Mine']);
        $this->actingAs($this->customer(17));

        try {
            (new Shipping)->deleteAddress($otherAddress->id);
            $this->fail('A customer must not delete another customer\'s address.');
        } catch (ModelNotFoundException) {
            $this->assertDatabaseHas('addresses', ['id' => $otherAddress->id]);
        }

        (new Shipping)->deleteAddress($ownAddress->id);
        $this->assertDatabaseMissing('addresses', ['id' => $ownAddress->id]);
    }

    private function customer(int $id): User
    {
        $user = new User;
        $user->id = $id;

        return $user;
    }
}
