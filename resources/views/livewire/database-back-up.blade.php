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
        <div class="col-md-8">
            <div class="country-list">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Database Backup</h4>
                    <button class="btn btn-sm btn-primary float-right" wire:click.prevent="downloadBackup">
                        <i class="fas fa-database"></i> Backup
                    </button>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>COD</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
