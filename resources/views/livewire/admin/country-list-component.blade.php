<div class="col-md-8">
    <div class="country-list">
        <h4>Country List</h4>
        <livewire:country-count-component :count="$this->count" />
        <input type="text" wire:model.live.debounce.500ms="search" class="form-control mb-2"
            placeholder="Search countries..." style="width:40%;float:right">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>COD</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->countries as $country)
                    <tr>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->code }}</td>
                        <td class="action-btns text-center">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger delete-confirm"
                                wire:click="confirmDeleteCountry({{ $country->id }})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
        {{-- {{ $this->countries->links() }} --}}

    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('country-success', event => {
            swal("Success", event.detail.message, "success");
        });

        window.addEventListener('confirm-delete-country', event => {
            swal({
                title: "Are you sure?",
                text: "This action cannot be undone.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id'))
                        .call('confirmDeleteCountry', event.detail.id);
                }
            });
        });
    });
</script>
