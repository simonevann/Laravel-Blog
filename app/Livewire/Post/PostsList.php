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
        $this->posts = Posts::select('*')->orderBy('id', 'desc')->get();
        if ($this->categoryId) {
            $this->posts = Posts::where('category_id', $this->categoryId)->orderBy('id', 'desc')->get();
        }
    }

    #[On('refresh-post-list')]
    public function refreshPosts()
    {
        $this->posts = Posts::select('*')->orderBy('id', 'desc')->get();
        if ($this->categoryId) {
            $this->posts = Posts::where('category_id', $this->categoryId)->orderBy('id', 'desc')->get();
        }
    }

    public function render()
    {
        return view('livewire.post.posts-list');
    }
}
