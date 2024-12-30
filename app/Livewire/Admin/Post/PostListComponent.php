<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostListComponent extends Component
{
    use WithPagination;
    public $state = [];

    protected $rules = [
        'state.title' => 'required|string|max:255',
        'state.detail' => 'required|string',
    ];

    protected $messages = [
        'state.title.required' => 'The title field is required.',
        'state.detail.required' => 'The detail field is required.',
    ];

    protected $validationAttributes = [
        'state.title' => 'title',
        'state.detail' => 'details',
    ];

    function AddPost()
    {
        $this->dispatch('postModal');
    }

    public function createPost()
    {
        $this->validate();
        Post::create([
            'title' => $this->state['title'],
            'detail' => $this->state['detail'],
        ]);
        $this->resetForm();
        $this->dispatch('closeModal');
        session()->flash('success', 'Post Create Success');
    }

    public function resetForm()
    {
        $this->state = [];
    }

    public function render()
    {
        return view('livewire.admin.post.post-list-component', ['posts' => Post::query()->orderBy('id', 'desc')->paginate(10)])->layout('admin.layouts.app');
    }
}
