<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthenticatedUserCanAccessRoute()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('punk-beers-listpage'));

        $response->assertStatus(200);
    }

    public function testGuestUserCannotAccessRoute()
    {
        $response = $this->get(route('punk-beers-listpage'));

        $response->assertStatus(302);

        $response->assertRedirect('/');
    }
}

