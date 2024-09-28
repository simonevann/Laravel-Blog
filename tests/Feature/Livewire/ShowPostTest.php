<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Post\Post;
use App\Models\Posts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ShowPostTest extends TestCase
{
    public function testRendersSuccessfully(): void
    {
        $post = Posts::factory()->create();

        Livewire::test(Post::class, ['post' => $post])
            ->assertStatus(200);
    }

    /** @test */
    public function component_exists_on_the_page()
    {
        $post = Posts::factory()->create();

        Livewire::test(Post::class, ['post' => $post])
            ->assertStatus(200);

    }

}