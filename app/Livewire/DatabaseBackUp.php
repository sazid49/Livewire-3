<?php

namespace App\Livewire;

use Livewire\Component;

class DatabaseBackUp extends Component
{

    public function downloadBackup()
    {
        // dd('hello');
        // Create a backup file name with timestamp
        $fileName = 'backup-' . date('Y-m-d_H-i-s') . '.sql';

        // Path to store the backup temporarily
        $filePath = storage_path('app/' . $fileName);

        // dd($filePath);

        // Generate the backup (using `mysqldump` for MySQL, you can adapt this for other DBs)
        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_HOST'),
            env('DB_DATABASE'),
            $filePath
        );

        // Execute the backup command
        $result = null;
        system($command, $result);

        if ($result === 0 && file_exists($filePath)) {
            return response()->download($filePath)->deleteFileAfterSend(true);
        }

        session()->flash('error', 'Backup failed. Please check your database connection and try again.');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.database-back-up')->layout('admin.layouts.app');
    }
}
