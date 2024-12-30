<div class="container">
    <style>
        .container {
            padding-top: 20px;
        }

        .country-list,
        .country-form {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .country-form h4 {
            font-weight: bold;
            color: #5a5a5a;
        }

        .country-list h4 {
            font-weight: bold;
            color: #007bff;
        }

        .country-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .country-item:last-child {
            border-bottom: none;
        }
    </style>
    <div class="row">
        <!-- Country List Column (col-8) -->
        <livewire:admin.country-list-component />

        <!-- Country Create Form Column (col-4) -->
        <livewire:admin.country-form-component />

        @section('scripts')
        @endsection
    </div>


</div>
