<?php

namespace App\Livewire\Nav;

use App\Models\PostCategories;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CategoriesList extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = PostCategories::all();
    }

    public function render()
    {
        Log::info('Livewire Comp: nav.categories-list caricato');

        return view('livewire.nav.categories-list');
    }
}
