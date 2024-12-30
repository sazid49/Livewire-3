<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class CountryComponent extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.country-component');
    }
}
