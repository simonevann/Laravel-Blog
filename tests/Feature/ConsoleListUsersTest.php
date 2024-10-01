<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsoleListUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_list_all_users(): void
    {
        $this->artisan('app:list-users')->assertSuccessful();
    }
}
