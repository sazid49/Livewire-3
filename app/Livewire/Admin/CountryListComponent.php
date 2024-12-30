<?php

namespace App\Livewire\Admin;

use App\Models\Country;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;



class CountryListComponent extends Component
{

    #[Url]
    public $search;

    use WithPagination;




    public function confirmDeleteCountry($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        $this->dispatch('country-success', ['message' => 'Country deleted successfully!']);
    }


    #[Computed()]
    function countries()
    {
        return Country::query()->where('name', 'like', "%{$this->search}%")->orWhere('code', 'like', "%{$this->search}%")->orderBy('id', 'desc')->get();
    }

    #[Computed()]
    function count()
    {
        return Country::query()->count();
    }

    #[On('country-created')]
    public function render()
    {
        return view('livewire.admin.country-list-component');
    }
}
