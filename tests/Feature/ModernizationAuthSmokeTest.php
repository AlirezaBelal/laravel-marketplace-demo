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
}
