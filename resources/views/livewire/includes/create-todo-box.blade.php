<section class="vh-100" style="background-color: #eee;">
    <style>
        .form-outline {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Ensure alignment starts at the input */
        }

        .form-outline .form-control {
            height: 40px;
            /* Match the input height with the button */
        }

        .form-outline .text-danger {
            position: relative;
            top: 2px;
            font-size: 0.85rem;
            /* Adjust error message size */
            line-height: 1.2;
            /* Ensure consistent spacing */
        }

        button.btn {
            height: 40px;
            /* Match the input height */
            line-height: 1.5;
        }
    </style>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <h4 class="text-center my-3 pb-3">To Do App</h4>

                        {{-- <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                            <div class="col-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="name" wire:model.live="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter a task here" />
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button wire:click.prevent="CreateToDo" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </form> --}}

                        <form
                            class="row row-cols-1 row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                            <div class="col-auto">
                                <div class="form-outline position-relative">
                                    <input type="text" id="name" wire:model.live="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter a task here" />
                                    @error('name')
                                        <span class="text-danger d-block small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-auto">
                                <button wire:click.prevent="CreateToDo" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </form>

                        @if (session()->has('success'))
                            <span class="text-success">{{ session('success') }}</span>
                        @endif

                        <input type="text" id="name" wire:model.live.debounce.500ms="search"
                            class="form-control" placeholder="Search Here....." />

                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Todo item</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($toDOList as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>
                                            @if ($editID === $item->id)
                                                <div>
                                                    <input type="text" wire:model="editName" class="form-control">
                                                    @error('editName')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            @else
                                                {{ $item->name }} <br>
                                            @endif
                                            {{ $item->created_at->diffForHumans() }}
                                            @if ($editID === $item->id)
                                                <div class="m-2 p-2">
                                                    <button wire:click="update"
                                                        class="btn btn-sm btn-success">Update</button>
                                                    <button wire:click="editCancel"
                                                        class="btn btn-sm btn-danger">Cancel</button>
                                                </div>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class=""><input type="checkbox"
                                                        wire:click="toggle({{ $item->id }})" checked></span>
                                            @else
                                                <span class=""><input type="checkbox"
                                                        wire:click="toggle({{ $item->id }})"></span>
                                            @endif
                                        </td>
                                        <td>
                                            <button wire:click="edit({{ $item->id }})"
                                                class="btn btn-sm btn-success ms-1"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <button wire:click="delete({{ $item->id }})"
                                                class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $toDOList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
