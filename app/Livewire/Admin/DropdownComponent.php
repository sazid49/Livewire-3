<?php

namespace App\Livewire\Admin;

use App\Models\Job;
use App\Models\Country;
use Livewire\Component;
use App\Models\District;
use App\Models\Division;


class DropdownComponent extends Component
{
    public $countrys;
    public $divisions = [];
    public $districts = [];
    public $selectedCountry = null;
    public $selectedDivision = null;
    public $selectedDistrict = null;
    public $jobTitle;

    public function mount()
    {
        $this->countrys = Country::all();
    }

    public function updatedSelectedCountry($countryId)
    {
        // dd('hello');
        $this->divisions = Division::where('country_id', $countryId)->get();
        $this->selectedDivision = null;
        $this->districts = [];
    }

    public function updatedSelectedDivision($divisionId)
    {
        // dd('hello');
        $this->districts = District::where('division_id', $divisionId)->get();
        $this->selectedDistrict = null;
    }

    public function storeData()
    {
        $this->validate([
            'selectedCountry' => 'required',
            'selectedDivision' => 'required',
            'selectedDistrict' => 'required',
            'jobTitle' => 'required|string|max:255',
        ]);

        // Store job data
        Job::create([
            'country_id' => $this->selectedCountry,
            'division_id' => $this->selectedDivision,
            'district_id' => $this->selectedDistrict,
            'title' => $this->jobTitle,
        ]);

        // Clear form inputs
        // $this->reset(['selectedCountry', 'selectedDivision', 'selectedDistrict', 'jobTitle']);

        // Show success message
        // session()->flash('message', 'Job created successfully.');
        return redirect()->route('admin.jobs')->with('message', 'Job created successfully.');
    }

    public function render()
    {
        return view('livewire.admin.dropdown-component')->layout('admin.layouts.app');
    }
}
