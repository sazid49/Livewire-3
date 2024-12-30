<?php

namespace App\Livewire\Admin;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CountryComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.country-component')->layout('admin.layouts.app');
    }
}
