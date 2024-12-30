<div>
    @if (session()->has('message'))
        <span style="color: green;background:black">User Create Success</span>
    @endif
    <form wire:submit="createUser">
        <input type="text" wire:model="name" placeholder="name">
        @error('name')
            <span style="color:red">{{ $message }}</span>
        @enderror <br><br>
        <input type="email" wire:model="email" placeholder="email">
        @error('email')
            <span style="color:red">{{ $message }}</span>
        @enderror <br><br>
        <input type="password" wire:model="password" placeholder="password">
        @error('password')
            <span style="color:red">{{ $message }}</span>
        @enderror <br><br>
        <button>Create User</button>
    </form>

    @foreach ($users as $item)
        <li>{{ $item->name }}</li>
    @endforeach

    <p style="background: yellow"></p> {{ $users->links('vendor.livewire.new') }}
</div>
