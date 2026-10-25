<?php

namespace Tests\Feature;

use Tests\TestCase;

final class ModernizationAuthSmokeTest extends TestCase
{
    public function test_guest_account_entry_renders_under_livewire_four(): void
    {
        // Do not submit a form or invoke SMS / payment providers.
        $response = $this->get('/users/login-register');

        $response->assertOk();
        $response->assertSee('wire:submit.prevent="userForm"', false);
    }

    public function test_guest_cannot_access_administration(): void
    {
        $this->get('/admin')->assertRedirect(route('login'));
    }

    public function test_guest_cannot_access_seller_dashboard(): void
    {
        $this->get('/seller')->assertRedirect(route('seller.login'));
    }

    public function test_bank_callback_without_transaction_id_does_not_mark_payment(): void
    {
        // This is intentionally database-free; verify only the early exit
        // for missing transaction credentials, never a simulated success.
        $this->get(route('bank.callback'))->assertRedirect(route('home.index'));
    }
}
