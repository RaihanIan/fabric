<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as InertiaAssert;

class AuthenticationIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the login page can be rendered
     */
    public function test_login_page_is_rendered()
    {
        $response = $this->get('/login');
        
        $response->assertStatus(200);
        $response->assertInertia(fn (InertiaAssert $page) => 
            $page->component('Auth/Login')
        );
    }

    /**
     * Test successful admin login and redirection
     */
    public function test_admin_login_successful()
    {
        // Create an admin user
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin_password'),
            'role' => 'admin',
        ]);

        // Attempt login
        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'admin_password',
        ]);

        // Assert redirection to dashboard
        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    /**
     * Test successful user login and redirection
     */
    public function test_user_login_successful()
    {
        // Create a regular user
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('user_password'),
            'role' => 'user',
        ]);

        // Attempt login
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'user_password',
        ]);

        // Assert redirection to landing page
        $response->assertRedirect(route('landing'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test login failure with invalid credentials
     */
    public function test_login_fails_with_invalid_credentials()
    {
        // Attempt login with non-existent user
        $response = $this->post('/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'invalidpassword',
        ]);

        // Assert error and guest status
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /**
     * Test login validation
     */
    public function test_login_requires_email_and_password()
    {
        // Test empty email
        $response1 = $this->post('/login', [
            'email' => '',
            'password' => 'somepassword',
        ]);
        $response1->assertSessionHasErrors(['email']);

        // Test empty password
        $response2 = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '',
        ]);
        $response2->assertSessionHasErrors(['password']);
    }

    /**
     * Test login with invalid email format
     */
    public function test_login_requires_valid_email_format()
    {
        // Test with invalid email format
        $response = $this->post('/login', [
            'email' => 'invalidemail',
            'password' => 'somepassword',
        ]);
        
        // Assert validation error for email format
        $response->assertSessionHasErrors(['email']);
    }

    /**
     * Test user logout functionality
     */
    public function test_user_can_logout()
    {
        // Create and authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Perform logout
        $response = $this->post('/logout');

        // Assert redirected to home and logged out
        $response->assertRedirect('/');
        $this->assertGuest();
    }

    
}
