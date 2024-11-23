<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function total_patients()
    {
        $total_patients = User::where('user_type', 'patient')->count();

        $total_appointments_today = Appointment::where('appointment_date',Carbon::parse(now())->format('Y-m-d'))->count();

        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY)->addDays(6);

        $total_appointments_this_week = Appointment::whereBetween('appointment_date', [$startOfWeek, $endOfWeek])->count();

        return json_encode([
            'total_patients'=> $total_patients,
            'total_appointments_today'=> $total_appointments_today,
            'total_appointments_this_week'=> $total_appointments_this_week
        ]);
    }

    public function all_patients(){
        return User::with('userDetails')->where('user_type','patient')->get();
    }
}
