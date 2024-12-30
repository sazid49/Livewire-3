<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class UserComponent extends Component
{
    public $state = [];

    function addUser()
    {
        $this->dispatch('userModel');
    }



    public  function  createUser()
    {
        User::create($this->state);
        $this->resetForm();
        $this->dispatch('closeModal');
        session()->flash('success', 'User create success');
    }

    private function resetForm()
    {
        $this->state = [];
    }
    public function render()
    {
        $users = User::query()->get();
        // dd($users);
        return view('livewire.admin.user-component', compact('users'))->layout('admin.layouts.app');
    }
}
