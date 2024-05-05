<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_auth_successful(): void
    {
        $user = User::factory()->create();
        $response = $this->post(route('login.index'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('index'));
        $this->assertAuthenticatedAs($user);
    }
    public function test_auth_error(): void
    {
        $user = User::factory()->create([
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password')
        ]);
        $response = $this->post(route('login.index'), [
            'email' => $user->email,
            'password' => 'otra'
        ]);

        $response->assertRedirect(route('login.index'));
        $this->assertGuest();
    }
}
