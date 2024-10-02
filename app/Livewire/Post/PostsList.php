<?php

namespace App\Livewire\Post;

use App\Models\Posts;
use Livewire\Component;

class PostsList extends Component
{
    public $posts;

    public $categoryId;

    public function mount()
    {
        if ($this->categoryId) {
            $this->posts = Posts::where('category_id', $this->categoryId)->where('status', 1)->orderBy('id', 'desc')->get();
        } else {
            $this->posts = Posts::where('status', 1)->orderBy('id', 'desc')->get();
        }
    }

    #[On('refresh-post-list')]
    public function refreshPosts()
    {
        if ($this->categoryId) {
            $this->posts = Posts::where('category_id', $this->categoryId)->where('status', 1)->orderBy('id', 'desc')->get();
        } else {
            $this->posts = Posts::where('status', 1)->orderBy('id', 'desc')->get();
        }
    }

    public function render()
    {
        return view('livewire.post.posts-list');
    }
}
