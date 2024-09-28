<?php

namespace App\Livewire\Post;

use App\Models\Posts;
use App\Service\Slug;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Post extends Component
{
    public $title;

    public $slug;

    public $id;

    public $parts = [];

    public $date;

    public $update_date;

    public $category;

    public function mount(Posts $post)
    {
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->id = $post->id;
        $this->parts = $post->parts;
        $this->date = $post->created_at;
        $this->update_date = $post->updated_at;
        $this->category = $post->category->name;
    }

    #[On('refresh-post-parts')]
    public function refreshParts()
    {
        $post = Posts::find($this->id);
        $this->parts = $post->parts;
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
        ]);

        $post = Posts::find($this->id);
        $post->title = $this->title;
        $post->slug = $this->slug;

        if ($post->save()) {
            $this->addError('message', 'Modifica salvata! Occhio se hai modificato lo Slug, potresti dover aggiornare i link.');
        } else {
            $this->addError('message', 'Oh no... Un errore durante il salvataggio del post. Riprova.');
        }
    }

    public function delete()
    {
        $post = Posts::find($this->id);
        if ($post->delete()) {
            return redirect()->route('home');
        } else {
            $this->addError('message', 'Oh no... Un errore durante l\'eliminazione del post. Riprova.');
        }
    }

    public function render()
    {
        Log::info('Livewire Comp: post.post id {id} caricato', ['id' => $this->id]);

        return view('livewire.post.post');
    }
}
