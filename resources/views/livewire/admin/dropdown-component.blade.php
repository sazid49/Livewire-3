<div class="container">
    <div class="row">
        <div class="col-4">
            <label for="country">Country</label>
            <select id="country" wire:model.live="selectedCountry" class="form-control select2">
                <option value="">Select Country</option>
                @foreach ($countrys as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('selectedCountry') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-4">
            <label for="division">Division</label>
            <select id="division" wire:model.live="selectedDivision" class="form-control select2">
                <option value="">Select Division</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
            @error('selectedDivision') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-4">
            <label for="district">District</label>
            <select id="district" wire:model="selectedDistrict" class="form-control select2">
                <option value="">Select District</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
            @error('selectedDistrict') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <label for="jobTitle">Job Title</label>
            <input type="text" id="jobTitle" wire:model="jobTitle" class="form-control">
            @error('jobTitle') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <button wire:click="storeData" class="btn btn-primary">Save Job</button>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
