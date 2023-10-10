<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginWithValidCredentials()
    {
        $user = User::create([
             'name' => 'root',
             'email' => 'test@example.com',
             'password' => bcrypt('password'),
         ]);

        $response = $this->post('/api/login', [
            'username' => 'root',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    public function testLoginWithInvalidCredentials()
    {
        $response = $this->post('/api/login', [
            'username' => 'root',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Invalid credentials']);
    }
}

