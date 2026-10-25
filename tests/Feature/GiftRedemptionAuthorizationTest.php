<?php

namespace Tests\Feature;

use App\Http\Livewire\Home\Profile\Gift as GiftComponent;
use App\Models\Gift;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Livewire;
use Tests\TestCase;

final class GiftRedemptionAuthorizationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');
        DB::purge('sqlite');

        Schema::connection('sqlite')->create('users', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
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

        DB::table('users')->insert([
            ['id' => 17, 'name' => 'Synthetic customer one'],
            ['id' => 99, 'name' => 'Synthetic customer two'],
        ]);
        Gift::create(['code' => 'SYNTHETIC-CARD', 'type' => 0, 'value_price' => 900]);
    }

    public function test_an_unclaimed_card_can_be_claimed_once_but_not_stolen_by_another_user(): void
    {
        Livewire::actingAs(User::findOrFail(17))
            ->test(GiftComponent::class)
            ->set('gift.newcard', 'SYNTHETIC-CARD')
            ->call('giftForm');

        $this->assertDatabaseHas('gifts', [
            'code' => 'SYNTHETIC-CARD', 'type' => 1, 'user_id' => 17,
        ]);

        Livewire::actingAs(User::findOrFail(99))
            ->test(GiftComponent::class)
            ->set('gift.newcard', 'SYNTHETIC-CARD')
            ->call('giftForm');

        $this->assertDatabaseHas('gifts', [
            'code' => 'SYNTHETIC-CARD', 'type' => 1, 'user_id' => 17,
        ]);
    }

    public function test_expired_card_cannot_be_claimed(): void
    {
        Gift::where('code', 'SYNTHETIC-CARD')->update([
            'date_expire' => today()->subDay()->toDateString(),
        ]);

        Livewire::actingAs(User::findOrFail(17))
            ->test(GiftComponent::class)
            ->set('gift.newcard', 'SYNTHETIC-CARD')
            ->call('giftForm');

        $this->assertDatabaseHas('gifts', [
            'code' => 'SYNTHETIC-CARD', 'type' => 0, 'user_id' => null,
        ]);
    }
}
