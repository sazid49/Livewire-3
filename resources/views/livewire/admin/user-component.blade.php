<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>All User</h4>
                        <button wire:click.prevent="addUser" class="btn btn-primary">Add New</button>
                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="">Edit</a> ||
                                        <a href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" style="margin-top: 50px" id="userModel" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{--            {!! Form::open'(wire:submmit.prevent'=>'createUser') !!} --}}
                <form wire:submit="createUser">
                    <div class="modal-body">
                        <div class="mb-3">
                            {{ Form::label('name', 'Name :') }}
                            <input type="text" name="name" wire:model.live="state.name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('email', 'Email :') }}
                            <input type="email" name="email" wire:model.live="state.email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter Your email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('password', 'Password :') }}
                            <input type="password" name="password" wire:model.live="state.password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter Your Password">
                            <div class="invalid-feedback">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{ Form::label('re-password', 'Re-password :') }}
                            <input type="password" name="re_password" wire:model.live="state.re_password"
                                class="form-control @error('re_password') is-invalid @enderror"
                                placeholder="Enter Your Re_password">
                            @error('re_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    window.addEventListener('userModel', event => {
        $('#userModel').modal('show');
    });
    window.addEventListener('closeModal', event => {
        $('#userModel').modal('hide'); // Close the modal
    });
</script>
