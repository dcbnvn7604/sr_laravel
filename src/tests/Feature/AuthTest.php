<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Database\Seeders\DatabaseSeeder;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_success(): void
    {
        $this->seed(DatabaseSeeder::class);
        $response = $this->postJson('/api/auth', [
            'email' => 'test@example.com',
            'password' => 'laravel'
        ]);

        $response->assertStatus(200);
        $token = $response->json()['token'];
        $response = $this->withHeaders([
            'Authorization' => "Bearer {$token}"
        ])
            ->getJson('/api/user');
        $response->assertStatus(200);
    }
}
