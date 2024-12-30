<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class PracticeLivewire extends Component
{
    use WithPagination;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $email;
    #[Rule('required|min:8')]
    public $password;

    public function createUser()
    {
        // $this->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        // $this->resetForm();
        $this->reset(['name', 'email', 'password']);

        request()->session()->flash('message', 'User Create Success');
    }

    // public function resetForm()
    // {
    //     $this->name = "";
    //     $this->email = "";
    //     $this->password = "";
    // }
    public function render()
    {

        return view('livewire.practice-livewire', [
            'text' => 'hello',
            'users' => User::paginate(5, pageName: 'user-list'),
        ])->layout('admin.layouts.app');
    }
}
