<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function backup(){
        try {
            $dbName = env('DB_DATABASE');
            $dbUser = env('DB_USERNAME');
            $dbPassword = env('DB_PASSWORD');
            $dbHost = env('DB_HOST');
            $backupFile = 'backup-' . date('Y-m-d_H-i-s') . '.sql';

            // Full path to mysqldump executable
            $mysqldumpPath = '"C:\Program Files\MySQL\MySQL Server 8.0\bin\mysqldump.exe"'; // Adjust this to your actual path

            // Backup file path
            $backupPath = storage_path('app/backups/' . $backupFile);

            // Create the command to run mysqldump
            $command = sprintf(
                '%s -u%s -p%s -h%s %s > "%s"',
                $mysqldumpPath,
                escapeshellarg($dbUser),
                escapeshellarg($dbPassword),
                escapeshellarg($dbHost),
                escapeshellarg($dbName),
                escapeshellarg($backupPath)
            );

            // Execute the command
            exec($command, $output, $returnVar);

            // Check if the command ran successfully
            if ($returnVar !== 0) {
                // If mysqldump failed, return the output/error
                return response()->json(['error' => 'Backup failed', 'output' => $output], 500);
            }

            // Return the URL of the backup file
            $fileUrl = asset('backups/' . $backupFile);
            return response()->json(['fileUrl' => $fileUrl]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
    public function restore(Request $request){
        try {
            $request->validate([
                'backup_file' => 'required|file|mimetypes:sql,text/plain',
            ]);

            $dbName = env('DB_DATABASE');
            $dbUser = env('DB_USERNAME');
            $dbPassword = env('DB_PASSWORD');
            $dbHost = env('DB_HOST');

            $file = $request->file('backup_file');
            $filePath = $file->storeAs('temp', 'restore.sql');

            // Specify the full path to mysql.exe
            $mysqlPath = '"C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\mysql.exe"';  // Adjust this path

            $command = sprintf(
                '%s -u%s -p%s -h%s %s < %s 2>&1',
                $mysqlPath,
                escapeshellarg($dbUser),
                escapeshellarg($dbPassword),
                escapeshellarg($dbHost),
                escapeshellarg($dbName),
                escapeshellarg(storage_path('app/' . $filePath))
            );

            $output = [];
            $returnVar = 0;
            exec($command, $output, $returnVar);

            Log::error('Database restore command output:', ['output' => implode("\n", $output)]);
            Log::error('Database restore return code:', ['returnVar' => $returnVar]);

            if ($returnVar === 0) {
                return response()->json(['message' => 'Database restored successfully']);
            } else {
                return response()->json(['error' => 'Database restore failed.'], 500);
            }

        } catch (\Exception $e) {
            // Log the exception for further debugging
            Log::error('Database restore failed:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to restore the database.'], 500);
        }
    }

}


