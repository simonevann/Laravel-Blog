<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SiteLogo extends Component
{
    public function render()
    {
        Log::info('Livewire Comp: site-logo caricato');

        return view('livewire.site-logo');
    }
}
