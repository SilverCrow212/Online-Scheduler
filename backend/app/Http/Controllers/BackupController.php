<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function backup()
    {
        try {
            Artisan::call('backup:run');
            return response()->json(['message' => 'Backup created successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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


