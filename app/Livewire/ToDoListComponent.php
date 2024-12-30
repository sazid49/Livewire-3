<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\ToDOList as TodoLists;
use Livewire\WithPagination;

class ToDoListComponent extends Component
{

    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;
    public $search = '';

    public $editID;
    // #[Rule('required|min:3|max:50')]

    public $editName;

    public function updatingSearch()
    {
        // Reset pagination when the search query changes
        $this->resetPage();
    }

    public function CreateToDo()
    {
        // dd($this->name);
        $this->validate();
        TodoLists::create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        session()->flash('success', 'To do Create Success');
    }

    public function edit(TodoLists $todolist)
    {
        $this->editID = $todolist->id;
        $this->editName = $todolist->name;
    }

    public function update()
    {

        $this->validateOnly('editName');
        $todo = TodoLists::findOrFail($this->editID);
        $todo->update([
            'name' => $this->editName,
        ]);
        $this->editCancel();
        session()->flash('success', 'To Do Update Success');
    }

    public function editCancel()
    {
        $this->reset('editID', 'editName');
    }

    public function delete(TodoLists $todolist)
    {
        $todolist->delete();
        session()->flash('success', 'To do Delete Success');
    }

    public function toggle($id)
    {
        $data = TodoLists::findOrfail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        $data->update();
        session()->flash('success', 'To do Status Change Success');
    }

    public function render()
    {
        return view('livewire.to-do-list-component', [
            'toDOList' => TodoLists::query()->latest()->where('name', 'like', "%{$this->search}%")->paginate(2),
        ])->layout('admin.layouts.app');
    }
}
