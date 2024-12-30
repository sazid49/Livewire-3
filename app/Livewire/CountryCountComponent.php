<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class CountryCountComponent extends Component
{
    #[Reactive]

    public $count;

    public function render()
    {
        return view('livewire.country-count-component');
    }
}
