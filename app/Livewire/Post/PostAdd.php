<?php

namespace App\Livewire\Post;

use App\Models\PostCategories;
use App\Models\Posts;
use App\Service\Slug;
use Livewire\Component;

class PostAdd extends Component
{
    public $title;

    public $slug;

    public $category_id;

    public $categories;

    public $user_id;

    public function mount()
    {
        $this->categories = PostCategories::all();
        $this->user_id = auth()->user()->id;
    }

    public function save()
    {

        if ($this->slug == '') {
            $this->slug = $this->title;
        }

        $this->slug = Slug::createSlug($this->slug);

        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
        ]);

        $post = new Posts;
        $post->title = $this->title;
        $post->slug = $this->slug;
        $post->category_id = $this->category_id;
        $post->user_id = $this->user_id;
        $post->save();

        //reset form
        $this->title = '';
        $this->slug = '';
        $this->category_id = '';

        $this->dispatch('refresh-post-list');
    }

    public function render()
    {
        return view('livewire.post.post-add');
    }
}
