<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Post\PostAdd;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_post(): void
    {
        //Get sa authenticated user from the database
        $user = User::factory()->create();
        //Login the user
        $this->actingAs($user);
        //Random title
        $title = fake()->sentence;
        //Random slug
        $slug = fake()->slug;
        Livewire::test(PostAdd::class)
            ->set('title', $title)
            ->set('slug', $slug)
            ->set('category_id', '1')
            ->set('user_id', '2')
            ->call('save')
            ->assertStatus(200);
    }

    public function test_create_post_validation(): void
    {
        //Get sa authenticated user from the database
        $user = User::factory()->create();
        //Login the user
        $this->actingAs($user);
        //Random title
        $title = fake()->sentence;
        //Random slug
        $slug = fake()->slug;
        Livewire::test(PostAdd::class)
            ->set('title', '')
            ->set('slug', $slug)
            ->set('category_id', '1')
            ->set('user_id', '2')
            ->call('save')
            ->assertHasErrors(['title']);
    }

    public function test_create_post_validation_unique_slug(): void
    {
        //Get sa authenticated user from the database
        $user = User::factory()->create();
        //Login the user
        $this->actingAs($user);
        //Random title
        $title = fake()->sentence;
        //Random slug
        $slug = 'not-unique-slug';
        Livewire::test(PostAdd::class)
            ->set('title', $title)
            ->set('slug', $slug)
            ->set('category_id', '1')
            ->set('user_id', '2')
            ->call('save')
            ->assertHasErrors(['slug']);
    }
}
