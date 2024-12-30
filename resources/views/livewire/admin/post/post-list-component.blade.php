<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Post List</h4>
                        <button wire:click.prevent="AddPost" class="btn btn-sm btn-primary"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No posts found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" style="margin-top: 50px" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{--            {!! Form::open'(wire:submmit.prevent'=>'createUser') !!} --}}
                <form wire:submit="createPost">
                    <div class="modal-body">
                        <div class="mb-3">
                            {{ Form::label('title', 'Title :') }}
                            <input type="text" name="name" wire:model="state.title"
                                class="form-control @error('state.title') is-invalid @enderror"
                                placeholder="Enter Post Title">
                            @error('state.title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('detail', 'Detail:') }}
                            <textarea name="" id="" cols="30" rows="5" wire:model="state.detail"
                                class="form-control @error('state.detail') is-invalid @enderror" placeholder="Enter Detail"></textarea>
                            @error('state.detail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span>Save</span>
                            <span wire:loading>
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin: auto; display: block;"
                                    width="24px" height="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#ffffff"
                                        stroke-dasharray="50.26548245743669 50.26548245743669" fill="none"
                                        stroke-linecap="round">
                                        <animateTransform attributeName="transform" type="rotate"
                                            repeatCount="indefinite" dur="1s" keyTimes="0;1"
                                            values="0 50 50;360 50 50">
                                        </animateTransform>
                                    </circle>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('postModal', event => {
        $('#postModal').modal('show');
    });
    window.addEventListener('closeModal', event => {
        $('#postModal').modal('hide'); // Close the modal
    });
</script>
