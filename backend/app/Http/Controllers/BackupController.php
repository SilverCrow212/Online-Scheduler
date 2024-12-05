<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Illuminate\Http\Request;
use App\Http\Controllers\LogsController;
use Carbon\Carbon;

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
            $mysqldumpPath = '"D:\\xampp\\mysql\\bin\\mysqldump.exe"'; // Adjust this to your actual path

            // Backup file path (full path to backup file)
            $backupPath = storage_path('app\\backups\\' . $backupFile);

            // Create the command to run mysqldump
            $command = "\"D:\\xampp\\mysql\\bin\\mysqldump.exe\" --user={$dbUser} --password={$dbPassword} --host={$dbHost} {$dbName} > \"{$backupPath}\"";

            // File URL (for public access)
            $fileUrl = asset('backups/' . $backupFile);

            // Execute the command
            exec($command);
            // Check if the command ran successfully
            // if ($returnVar !== 0) {
            //     // If mysqldump failed, return the output/error
            //     return response()->json(['error' => 'Backup failed', 'output' => $output], 500);
            // }
            $logsController = new LogsController();
            $logsController->logAction('backup database: '.Carbon::now());
            // Return the URL of the backup file
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

            // Get the uploaded file
            $file = $request->file('backup_file');
            // $filePath = $file->storeAs('temp', 'restore.sql');
            $fileName = $file->getClientOriginalName();
            $filePath = storage_path('app\\backups\\' . $fileName);

            // Specify the full path to mysql.exe
            $mysqlPath = "D:\\xampp\\mysql\\bin\\mysql.exe";  // Adjust this path

            // Construct the restore command
            $command = "\"$mysqlPath\" -h $dbHost -u $dbUser $dbName < \"$filePath\"";
            // return $command;
            // Execute the command
            exec($command);

            $logsController = new LogsController();
            $logsController->logAction('restored database: '.Carbon::now());
            $output = [];
            $returnVar = 0;
            // exec($command, $output, $returnVar);

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


