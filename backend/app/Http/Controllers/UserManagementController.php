<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserDetails;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    // REGISTER NEW USER RECORD
    public function register(Request $r){

        try {
            DB::beginTransaction(); // BEGIN CATCHING QUERIES. USE THIS ONLY WHEN MULTIPLE QUERIES ARE INVOLVED

                // THIS WILL CREATE A USER RECORD TO THE USER TABLE
                $createUser = User::create([
                    'school_id_number' => $r->school_id_number,
                    'email' => $r->email,
                    'user_type' => $r->user_type,
                    'password' => Hash::make($r->password),
                    'security_question' => $r->security_question,
                    'security_answer' => Hash::make($r->security_answer),
                    'status' => 1,
                ]);
                // THIS WILL CREATE A USER DETAILS RELATED TO THE USER RECORD
                UserDetails::create([
                    'user_id' => $createUser->id,
                    'school_id_number' =>  $r->school_id_number,
                    'firstname' => $r->firstname,
                    'lastname' => $r->lastname,
                    'middlename' => $r->middlename,
                    'type' => $r->type,
                    'employee_student_type' => $r->employee_student_type,
                    'employment_classification' => $r->employment_classification,
                    'office_level' => $r->office_level,
                    'department_program' => $r->department_program,
                    'sex' => $r->sex,
                    'email' => $r->email,
                    'contact_no' => $r->contact_no,
                    'civil_status' => $r->civil_status,
                    'guardian_firstname' => $r->guardian_firstname,
                    'guardian_middlename' => $r->guardian_middlename,
                    'guardian_lastname' => $r->guardian_lastname,
                    'guardian_no' => $r->guardian_no,
                    'permanent_address' => $r->permanent_address,
                    'bsu_address' => $r->bsu_address,
                    'age' => $r->age,
                ]);

                $logsController = new LogsController();
                $logsController->logAction('created user account: '.$r->school_id_number);

            DB::commit(); // IF ABOVE QUERIES ARE EXECUTED SUCCESSFULLY, ALL QUERIES WILL BE COMITTED AND THE DATABASE WILL BE AFFECTED

            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'data' => $createUser,
            ], 200);

        } catch (\Throwable $th) {
            if ($th instanceof \Illuminate\Database\QueryException && $th->getCode() === '23000') {
                if (strpos($th->getMessage(), 'school_id_number_UNIQUE') !== false) {
                    $errorMessage = 'School ID number is already taken.';
                } elseif (strpos($th->getMessage(), 'users_email_unique') !== false) {
                    $errorMessage = 'Email is already taken.';
                } else {
                    $errorMessage = 'A database error occurred.';
                }
            } else {
                $errorMessage = $th->getMessage();
            }
            // IF ABOVE QUERIES ARE EXECUTED WITH ERROR, THE QUERIES WILL ROLLBACK. NOTHING WILL CHANGE TO THE DATABASE
            DB::rollBack();
            // throw error message
            throw new \Exception($errorMessage);
        }

    }

    // RETRIEVE USER DETAILS
    public function user_details(){
        $userDetails = User::with('userDetails')->where('id', auth()->user()->id)->get();
        return $userDetails;
    }

    // RETRIEVE USER DETAILS PATIENT
    public function user_details_patient(Request $r){
        $id =  $r['appointmentid'];
        $userDetails = DB::table('users')
        ->join('user_details', 'users.id', '=', 'user_details.user_id')
        ->where('users.id', $id)
        ->get();
        return $userDetails;
    }

    // UPDATE USER DETAILS
    public function user_details_update(Request $r){
        // return $r;
        try {
            DB::beginTransaction();
                UserDetails::where('school_id_number', $r->school_id_number)
                ->update([
                    'firstname' => $r->firstname,
                    'lastname' => $r->lastname,
                    'middlename' => $r->middlename,
                    'type' => $r->type,
                    'employee_student_type' => $r->employee_student_type,
                    'employment_classification' => $r->employment_classification,
                    'office_level' => $r->office_level,
                    'department_program' => $r->department_program,
                    'sex' => $r->sex,
                    'email' => $r->email,
                    'contact_no' => $r->contact_no,
                    'civil_status' => $r->civil_status,
                    'guardian_firstname' => $r->guardian_firstname,
                    'guardian_middlename' => $r->guardian_middlename,
                    'guardian_lastname' => $r->guardian_lastname,
                    'guardian_no' => $r->guardian_no,
                    'permanent_address' => $r->permanent_address,
                    'bsu_address' => $r->bsu_address,
                    'age' => $r->age
                ]);

                $logsController = new LogsController();
                $logsController->logAction('updated user details of school#: '.$r->school_id_number);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function change_password(Request $r){
        try {
            DB::beginTransaction();
                User::where('school_id_number', $r->school_id_number)
                ->update([
                    'password'=> Hash::make($r->password)
                ]);

                $logsController = new LogsController();
                $logsController->logAction('changed the password of school#: '.$r->school_id_number);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function change_email(Request $r){
        try {
            DB::beginTransaction();
                // UPDATE USER TABLE
                User::where('school_id_number', $r->school_id_number)
                ->update([
                    'email'=> $r->email
                ]);
                // UPDATE USER_DETAILS TABLE
                UserDetails::where('school_id_number', $r->school_id_number)
                ->update([
                    'email' => $r->email
                ]);


                $logsController = new LogsController();
                $logsController->logAction('changed the email of school#: '.$r->school_id_number);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function updateSecurityQuestion(Request $r){
        try {
            DB::beginTransaction();
                User::where('school_id_number', $r->school_id_number)
                ->update([
                    'security_question' => $r->security_question,
                    'security_answer' => Hash::make($r->security_answer)
                ]);

                $logsController = new LogsController();
                $logsController->logAction('changed the security question of school#: '.$r->school_id_number);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Security question updated successfully',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function activateAccount(Request $r){
        try {
            foreach ($r->input('data') as $forUpdate) {
                if (isset($forUpdate['id'])) {
                    DB::table('users')
                        ->where('id', $forUpdate['id'])
                        ->update(['status' => 1]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'User account(s) activated successfully',
            ], 200);
        } catch (\Throwable $th) {
            \Log::error('Error activating account: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred while activating the account.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
    public function deactivateAccount(Request $r) {
        try {
            foreach ($r->input('data') as $forUpdate) {
                if (isset($forUpdate['id'])) {
                    DB::table('users')
                        ->where('id', $forUpdate['id'])
                        ->update(['status' => 0]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'User account(s) deactivated successfully',
            ], 200);
        } catch (\Throwable $th) {
            \Log::error('Error deactivating account: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred while deactivating the account.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    //For dependents
    public function get_dependents(Request $r) {
       // Step 1: Retrieve the dependents for a given user from the user_details table
    $getDependents = DB::table('user_details')
    ->where('school_id_number', $r->school_id_number)
    ->get(['dependents'])
    ->first();

    // Step 2: Decode the dependents array from JSON (if available)
    if ($getDependents && isset($getDependents->dependents)) {
    // Decode dependents JSON string to an array (e.g., ["1803214A", "1803214B"])
    $dependentsArray = json_decode($getDependents->dependents, true);
    } else {
    $dependentsArray = []; // If no dependents found, return an empty array
    }

    // Step 3: Retrieve the actual details for each dependent using their school_id_number
    // If there are dependents, query the User model to get the details of each dependent
    if (!empty($dependentsArray)) {
    $dependentsDetails = User::with('userDetails')  // Eager load userDetails
                ->whereIn('school_id_number', $dependentsArray)  // Match dependents' school_id_numbers
                ->get();
    } else {
    $dependentsDetails = [];  // Return empty if no dependents
    }

    // Step 4: Return the details of the dependents as a JSON response
    return response()->json([
    'dependents_details' => $dependentsDetails
    ]);
    }

    public function save_dependents(Request $r){

        try {

                // THIS WILL CREATE A USER RECORD TO THE USER TABLE
                $createUser = User::create([
                    'school_id_number' => $r->school_id_number,
                    'email' => null,
                    'user_type' => $r->user_type,
                    'password' => null,
                    'security_question' => null,
                    'security_answer' => null,
                    'status' => 0,
                ]);
                // THIS WILL CREATE A USER DETAILS RELATED TO THE USER RECORD
                UserDetails::create([
                    'user_id' => $createUser->id,
                    'school_id_number' =>  $r->school_id_number,
                    'firstname' => $r->firstname,
                    'lastname' => $r->lastname,
                    'middlename' => $r->middlename,
                    'type' => $r->type,
                    'employee_student_type' => $r->employee_student_type,
                    'employment_classification' => $r->employment_classification,
                    'office_level' => $r->office_level,
                    'department_program' => $r->department_program,
                    'sex' => $r->sex,
                    'email' => $r->email,
                    'contact_no' => $r->contact_no,
                    'civil_status' => $r->civil_status,
                    'guardian_firstname' => $r->guardian_firstname,
                    'guardian_middlename' => $r->guardian_middlename,
                    'guardian_lastname' => $r->guardian_lastname,
                    'guardian_no' => $r->guardian_no,
                    'permanent_address' => $r->permanent_address,
                    'bsu_address' => $r->bsu_address,
                    'age' => $r->age,
                ]);

                $logsController = new LogsController();
                $logsController->logAction('created user account: '.$r->school_id_number);

                $updateDependents = DB::table('user_details')
                    ->where('school_id_number', $r->school_id_number_original)
                    ->first();

                if ($updateDependents) {
                    $dependents = json_decode($updateDependents->dependents, true); // Decode array
                    $dependents[] = $r->school_id_number;
                    $updatedDependents = json_encode($dependents);

                    DB::table('user_details')
                        ->where('school_id_number', $r->school_id_number_original)
                        ->update(['dependents' => $updatedDependents]);
                }
            DB::commit(); // IF ABOVE QUERIES ARE EXECUTED SUCCESSFULLY, ALL QUERIES WILL BE COMITTED AND THE DATABASE WILL BE AFFECTED

            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'data' => $createUser,
            ], 200);

        } catch (\Throwable $th) {
            if ($th instanceof \Illuminate\Database\QueryException && $th->getCode() === '23000') {
                if (strpos($th->getMessage(), 'school_id_number_UNIQUE') !== false) {
                    $errorMessage = 'School ID number is already taken.';
                } elseif (strpos($th->getMessage(), 'users_email_unique') !== false) {
                    $errorMessage = 'Email is already taken.';
                } else {
                    $errorMessage = $th;
                }
            } else {
                $errorMessage = $th->getMessage();
            }
            // throw error message
            throw new \Exception($errorMessage);
        }
    }
}
