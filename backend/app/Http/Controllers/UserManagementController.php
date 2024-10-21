<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    //
    public function register(Request $r){
        $r->validate([
            'school_id_number' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }
}
