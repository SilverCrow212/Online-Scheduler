<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use DB;

class SecurityQuestionController extends Controller
{
    public function verifySecurityAnswer(Request $request)
    {
        $request->validate([
            'school_id_number' => 'required',
            'security_question' => 'required',
            'security_answer' => 'required'
        ]);

        $user = User::where('school_id_number', $request->school_id_number)->first();

        if (!$user || $user->security_question != $request->security_question || !Hash::check($request->security_answer, $user->security_answer)) {
            return response()->json([
                'error' => 'Invalid ID number or security credentials',
                'status' => 'invalid'
            ], 400);
        }

        // Allow access to reset password
        return response()->json([
            'message' => 'Security answer verified. You may proceed to reset your password.',
            'status' => 'verified'
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'school_id_number' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('school_id_number', $request->school_id_number)->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid ID number'], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'Password has been successfully reset.'
        ], 200);
    }

    public function getSecurityQuestion(){
        $security_question = DB::table('security_questions_lib')->get();
        return response()->json([
            'security_question' => $security_question
        ]);
    }


}
