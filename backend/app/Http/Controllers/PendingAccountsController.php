<?php

namespace App\Http\Controllers;

use App\Models\Holidays;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class PendingAccountsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $r)
    {
        // return $r;
        // Retrieve 'details' from the request
        $details = $r->input('details');

        // Validate and handle the uploaded file if exists
        if ($r->hasFile('demo')) {
            // Validate the file type and size (for example, image files with max size 1MB)
            $validatedData = $r->validate([
                'demo' => 'required|image|mimes:jpg,jpeg,png,gif|max:1000', // Adjust as needed
            ]);

            // Get the file from the request
            $file = $r->file('demo');

            // Generate a unique filename and store the file in 'public/uploads' directory
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads', $filename, 'public');  // Store in public disk

            // Optionally, you could store the filename in the database as well
        }

        // Insert 'details' and the file path (if uploaded) into the 'pending_accounts' table
        DB::table('pending_accounts')->insert([
            'details' => $details, // Assuming 'details' is a JSON column
            'file_path' => isset($filePath) ? $filePath : null, // Store the file path if file is uploaded
        ]);

        // Return the response
        return response()->json([
            'message' => 'Data saved successfully',
            'file_path' => $filePath ?? null, // Return the file path if uploaded
        ]);
    }

    public function get_list(Holidays $holidays)
    {
        $results = DB::table('pending_accounts')->get();

        // Decode the 'details' column and add the file URL
        $results = $results->map(function ($item) {
            // Decode the 'details' column (if it's not empty)
            if ($item->details) {
                $decodedDetails = json_decode($item->details, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $item->details = $decodedDetails;
                } else {
                    $item->details = [];
                }
            } else {
                $item->details = [];
            }

            // Check if the file exists and generate the file URL
            if (isset($item->file_path) && $item->file_path) {
                $item->file_url = asset('storage/' . $item->file_path);
            } else {
                $item->file_url = null; // No file uploaded
            }

            return $item;
        });

        return response()->json($results);
    }

    public function deletePendingAccount($id)
{
    // Find the record by ID
    $pendingAccount = DB::table('pending_accounts')->where('id', $id)->first();

    if (!$pendingAccount) {
        return response()->json(['message' => 'Record not found'], 404);
    }

    // Delete the record
    DB::table('pending_accounts')->where('id', $id)->delete();

    return response()->json(['message' => 'Record deleted successfully']);
}
}
