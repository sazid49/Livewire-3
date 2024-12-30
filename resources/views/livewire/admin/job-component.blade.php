<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>All User</h4>
                        <button wire:click.prevent="addPost" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif


                <div class="card-body">
                    <table class="table table-dark text-center" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Country</th>
                                <th scope="col">Division</th>
                                <th scope="col">District</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->country->name }}</td>
                                    <td>{{ $job->division->name }}</td>
                                    <td>{{ $job->district->name }}</td>
                                    <td>
                                        <a wire:click="edit({{ $job->id }})"><i class="fa fa-edit"></i></a>
                                        <a wire:click="destroy({{ $job->id }})" class="text-danger"><i
                                                class="fa fa-trash"></i></a>
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
    <div class="modal fade" style="margin-top: 50px" id="job-model" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg"> <!-- Use modal-lg for larger width -->
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $jobId ? 'Edit Job' : 'Add Job' }} <!-- Change title based on jobId -->
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetModedel"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" wire:model.live="selectedCountry" class="form-control select2">
                                <option value="">Select Country</option>
                                @foreach ($countrys as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedCountry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="division" class="form-label">Division</label>
                            <select id="division" wire:model.live="selectedDivision" class="form-control select2">
                                <option value="">Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedDivision')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="district" class="form-label">District</label>
                            <select id="district" wire:model="selectedDistrict" class="form-control select2">
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedDistrict')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" id="jobTitle" wire:model="jobTitle" class="form-control"
                                placeholder="Enter job title">
                            @error('jobTitle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="resetModedel">Cancel</button>
                    <button type="submit" class="btn btn-primary"
                        wire:click="{{ $jobId ? 'updateData' : 'storeData' }}">
                        {{ $jobId ? 'Update' : 'Save' }} <!-- Change button text based on jobId -->
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    window.addEventListener('job-model', event => {
        $('#job-model').modal('show');
    });
    window.addEventListener('closeModal', event => {
        $('#job-model').modal('hide'); // Close the modal
    });
</script>
