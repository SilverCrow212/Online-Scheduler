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
                    'security_answer' => Hash::make($r->security_answer)
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
                    'guardian' => $r->guardian,
                    'guardian_no' => $r->guardian_no,
                    'permanent_address' => $r->permanent_address,
                    'bsu_address' => $r->bsu_address,
                    'age' => $r->age,
                ]);

                $logsController = new LogsController();
                $logsController->logAction('created user account: '.$createUser->id);

            DB::commit(); // IF ABOVE QUERIES ARE EXECUTED SUCCESSFULLY, ALL QUERIES WILL BE COMITTED AND THE DATABASE WILL BE AFFECTED

            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'data' => $createUser,
            ], 200);

        } catch (\Throwable $th) {
            // IF ABOVE QUERIES ARE EXECUTED WITH ERROR, THE QUERIES WILL ROLLBACK. NOTHING WILL CHANGE TO THE DATABASE
            DB::rollBack();
            // throw error message
            throw $th;
        }

    }

    // RETRIEVE USER DETAILS
    public function user_details(){
        $userDetails = User::with('userDetails')->where('id', auth()->user()->id)->get();
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
                    'employment_classification' => $r->emplyment_classification,
                    'office_level' => $r->office_level,
                    'department_program' => $r->department_program,
                    'sex' => $r->sex,
                    'email' => $r->email,
                    'contact_no' => $r->contact_no,
                    'civil_status' => $r->civil_status,
                    'guardian' => $r->guardian,
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
}
