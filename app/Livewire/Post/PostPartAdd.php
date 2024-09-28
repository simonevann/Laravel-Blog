<?php

namespace App\Livewire\Post;

use App\Models\PostParts;
use App\Models\PostTypes;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostPartAdd extends Component
{
    use WithFileUploads;

    public $postId;

    public $content;

    public $post_type_id;

    public $types;

    #[Validate('image|max:1024')] // 1MB Max
    public $image;

    public $imageName;

    public function mount($postId)
    {
        $this->types = PostTypes::all();
    }

    public function save()
    {
        if ($this->image) {
            $this->validate([
                'image' => 'image|max:1024', // 1MB Max
            ]);
            $this->image->storeAs(path: 'public', name: $this->image->getClientOriginalName());
            $this->imageName = $this->image->getClientOriginalName();
        }

        $this->validate([
            'post_type_id' => 'required',
        ]);

        $part = PostParts::create([
            'post_id' => $this->postId,
            'content' => $this->content,
            'post_type_id' => $this->post_type_id,
            'image' => $this->imageName,
        ]);

        $this->dispatch('refresh-post-parts');
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.post.post-part-add');
    }
}
