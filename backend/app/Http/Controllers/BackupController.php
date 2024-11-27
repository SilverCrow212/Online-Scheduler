<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function backup()
    {
        // try {
        //     Artisan::call('backup:run');
        //     return response()->json(['message' => 'Backup created successfully.']);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
        $mysqldumpPath = 'C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\mysqldump.exe';
        $defaultFilePath = '--defaults-file=G:\\External Projects\\Jampong\\Online-Scheduler\\.my.cnf';

        $dbHost = env('DB_HOST', '127.0.0.1'); // Use 127.0.0.1 as default
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');
        $backupFile = storage_path('app/backups/' . $dbName . '_backup_' . date('Y-m-d_H-i-s') . '.sql');

        if (!file_exists(dirname($backupFile))) {
            mkdir(dirname($backupFile), 0777, true);
        }


        // Prepare the command as an array
        $command = [
            $mysqldumpPath,
            $defaultFilePath,
            '--no-tablespaces',
            $dbName
        ];

        // Run the process and write the output to the file
        $process = new Process($command);
        $process->setTimeout(null); // Optional: Remove timeout for large databases

        // Run the process and capture the output directly
        $process->run();

        if ($process->isSuccessful()) {
            // Output the SQL file for download
            return response()->download($backupFile)->deleteFileAfterSend();
        } else {
            return response()->json(['error' => 'Backup failed: ' . $process->getErrorOutput()], 500);
        }
    }
    public function restore(Request $request)
    {
        $request->validate([
            'sql_file' => 'required|mimes:sql|max:10240', // Limit to 10MB
        ]);

        $sqlFile = $request->file('sql_file')->getPathname();
        $dbHost = env('DB_HOST', '127.0.0.1');
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');

        $command = sprintf(
            'mysql --user=%s --password=%s --host=%s %s < %s',
            escapeshellarg($dbUser),
            escapeshellarg($dbPass),
            escapeshellarg($dbHost),
            escapeshellarg($dbName),
            escapeshellarg($sqlFile)
        );

        $process = Process::fromShellCommandline($command);
        $process->run();

        if ($process->isSuccessful()) {
            return response()->json(['message' => 'Database restored successfully.']);
        } else {
            return response()->json(['error' => 'Restore failed: ' . $process->getErrorOutput()], 500);
        }
    }

}


