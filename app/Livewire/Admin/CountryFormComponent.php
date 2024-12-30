<?php

namespace App\Livewire\Admin;

use App\Models\Country;
use Livewire\Component;

class CountryFormComponent extends Component
{

    public $name;
    public $code;
    public function storCountry()
    {
        Country::insert([
            'name' => $this->name,
            'code' => $this->code,
        ]);

        $this->dispatch('country-created');
        // $this->reset([$this->name, $this->code]);
    }
    public function render()
    {
        return view('livewire.admin.country-form-component');
    }
}
