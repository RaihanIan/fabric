<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        // Membuat user dengan password yang sesuai
        $user = User::factory()->create([
            'password' => bcrypt('password'), // Pastikan password sama dengan yang akan digunakan di testing
        ]);

        // Melakukan request login
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password', // Harus cocok dengan password yang diatur di atas
        ]);

        // Memastikan user terautentikasi dan diarahkan ke dashboard
        $this->assertAuthenticated();
        $response->assertRedirect('/'); // Pastikan path sesuai dengan rute yang diatur
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}