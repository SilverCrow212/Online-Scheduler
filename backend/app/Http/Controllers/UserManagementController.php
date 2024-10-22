<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserDetails;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    //
    public function register(Request $r){

        // return $r->all();

        try {
            DB::beginTransaction();
                $createUser = User::create([
                    'school_id_number' => $r->school_id_number,
                    'email' => $r->email,
                    'password' => Hash::make($r->password),
                ]);

                $userDetails = UserDetails::create([
                    'user_id' => $createUser->id,
                    'school_id_number' =>  $r->school_id_number,
                    'firstname' => $r->firstname,
                    'lastname' => $r->lastname,
                    'middlename' => $r->middlename,
                    'type' => $r->type,
                    'employee_student_type' => $r->employee_student_type,
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
                ]);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'data' => $createUser,
            ], 200);

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }


    }
}
