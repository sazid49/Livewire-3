<div class="col-md-4">
    <div class="country-form">
        <h4>New Country Form</h4>
        <div class="form-group">
            <label for="countryName">Country Name</label>
            <input type="text" class="form-control" id="countryName" wire:model="name" placeholder="Enter country name">
        </div>
        <div class="form-group">
            <label for="countryCode">Country Code</label>
            <input type="text" class="form-control" id="countryCode" wire:model="code"
                placeholder="Enter country code">
        </div>
        <div class="form-group">
            <label for="countryCode">Status</label>
            <select name="" id="select2" class="form-control select2">
                <option value="">Select Option</option>
                @foreach (\App\Enums\StatusType::cases() as $item)
                    <option value="{{ $item->value }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2 text-center">
            <button type="submit" class="btn btn-primary btn-block" wire:click="storCountry"><i
                    class="fa fa-plus"></i></button>
        </div>
    </div>
</div>


@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2({
                placeholder: "Chooce One",
                allowClear: true
            });
        });
    </script> --}}
@endsection
