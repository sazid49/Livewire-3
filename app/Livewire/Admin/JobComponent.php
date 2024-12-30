<?php

namespace App\Livewire\Admin;

use App\Models\Job;
use App\Models\Country;
use Livewire\Component;
use App\Models\District;
use App\Models\Division;

class JobComponent extends Component
{
    public $countrys;
    public $divisions = [];
    public $districts = [];
    public $selectedCountry = null;
    public $selectedDivision = null;
    public $selectedDistrict = null;
    public $jobTitle;
    public $jobId;

    public function mount()
    {
        $this->countrys = Country::all();
    }

    public function updatedSelectedCountry($countryId)
    {
        $this->divisions = Division::where('country_id', $countryId)->get();
        $this->selectedDivision = null;  // Reset division selection
        $this->districts = [];           // Clear existing districts
        $this->selectedDistrict = null;   // Reset district selection
    }

    public function updatedSelectedDivision($divisionId)
    {
        $this->districts = District::where('division_id', $divisionId)->get();
        $this->selectedDistrict = null; // Reset district selection
    }

    public function storeData()
    {
        $this->validate([
            'selectedCountry' => 'required',
            'selectedDivision' => 'required',
            'selectedDistrict' => 'required',
            'jobTitle' => 'required|string|max:255',
        ]);

        Job::create([
            'country_id' => $this->selectedCountry,
            'division_id' => $this->selectedDivision,
            'district_id' => $this->selectedDistrict,
            'title' => $this->jobTitle,
        ]);

        $this->reset(['selectedCountry', 'selectedDivision', 'selectedDistrict', 'jobTitle']);
        $this->dispatch('closeModal');
        session()->flash('message', 'Job created successfully.');
    }

    public function addPost()
    {
        $this->reset(['jobId', 'jobTitle', 'selectedCountry', 'selectedDivision', 'selectedDistrict']);
        $this->dispatch('job-model');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $this->jobId = $job->id;
        $this->jobTitle = $job->title;
        $this->selectedCountry = $job->country_id;
        $this->selectedDivision = $job->division_id;
        $this->selectedDistrict = $job->district_id;

        // Load divisions and districts immediately
        $this->divisions = Division::where('country_id', $job->country_id)->get();
        $this->districts = District::where('division_id', $job->division_id)->get();

        $this->dispatch('job-model'); // Trigger modal open event
    }

    public function destroy($id)
    {
        try {
            Job::findOrFail($id)->delete();
            session()->flash('message', 'Job deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            session()->flash('error', 'Job not found.');
        }
    }

    public function updateData()
    {
        $this->validate([
            'selectedCountry' => 'required',
            'selectedDivision' => 'required',
            'selectedDistrict' => 'required',
            'jobTitle' => 'required|string|max:255',
        ]);

        $job = Job::findOrFail($this->jobId);
        $job->update([
            'title' => $this->jobTitle,
            'country_id' => $this->selectedCountry,
            'division_id' => $this->selectedDivision,
            'district_id' => $this->selectedDistrict,
        ]);

        $this->reset(['selectedCountry', 'selectedDivision', 'selectedDistrict', 'jobTitle']);
        $this->dispatch('closeModal');
        session()->flash('message', 'Job updated successfully.');
    }

    public function resetModedel()
    {
        $this->reset(['selectedCountry', 'selectedDivision', 'selectedDistrict', 'jobTitle']);
        $this->dispatch('closeModal');
    }

    public function render()
    {
        $jobs = Job::all();
        return view('livewire.admin.job-component', compact('jobs'))->layout('admin.layouts.app');
    }
}
