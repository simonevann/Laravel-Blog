<?php

namespace App\Livewire\Post;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PostsListItem extends Component
{
    public $post;

    public function render()
    {
        Log::info('Livewire Comp: post.posts-list-item id {id} caricato', ['id' => $this->post->id]);

        return view('livewire.post.posts-list-item');
    }
}
