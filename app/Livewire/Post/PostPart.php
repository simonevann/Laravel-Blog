<?php

namespace App\Livewire\Post;

use App\Models\PostParts;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostPart extends Component
{
    use WithFileUploads;

    public $content;

    public $contentRaw;

    public $id;

    public $showEdit = false;

    #[Validate('image|max:1024')] // 1MB Max
    public $image;

    public $imageName;

    public function mount(PostParts $part)
    {
        $this->id = $part->id;
        $this->contentRaw = $part->content;
        $this->content = $part->content ? Str::markdown($part->content) : '';
        $this->image = $part->image;
    }

    public function deleteImage()
    {
        $part = PostParts::find($this->id);
        $part->image = null;
        if ($part->save()) {
            $this->update();
            $this->addError('message', 'Immagine eliminata!');
        } else {
            $this->addError('message', 'Oh no... Un errore durante l\'eliminazione dell\'immagine. Riprova.');
        }
        $this->toggleEdit();
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

        $part = PostParts::find($this->id);
        $part->content = $this->contentRaw;
        $part->image = $this->imageName;
        if ($part->save()) {
            $this->update();
            $this->addError('message', 'Modifica salvata!');
        } else {
            $this->addError('message', 'Oh no... Un errore durante il salvataggio del post. Riprova.');
        }
        $this->toggleEdit();
    }

    public function update()
    {
        $post = PostParts::find($this->id);
        $this->contentRaw = $post->content;
        $this->content = $post->content ? Str::markdown($post->content) : '';
        $this->image = $post->image;
    }

    public function toggleEdit()
    {
        $this->showEdit = !$this->showEdit;
    }

    public function delete()
    {
        $part = PostParts::find($this->id);
        if ($part->delete()) {
            $this->dispatch('refresh-post-parts');
        } else {
            $this->addError('message', 'Oh no... Un errore durante l\'eliminazione del post. Riprova.');
        }
    }

    public function render()
    {
        Log::info('Livewire Comp: post.post-part id {id} caricato', ['id' => $this->id]);

        return view('livewire.post.post-part');
    }
}
