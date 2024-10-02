<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsoleListCategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_list_all_categories(): void
    {
        $this->artisan('app:list-categories')->assertSuccessful();
    }
}
