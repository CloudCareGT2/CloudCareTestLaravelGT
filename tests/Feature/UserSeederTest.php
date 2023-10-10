<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class UserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testSeedDatabase()
    {

        Artisan::call('db:seed --class=UserSeeder');
        $usersCount = User::count();

        $this->assertGreaterThan(0, $usersCount);
    }
}

