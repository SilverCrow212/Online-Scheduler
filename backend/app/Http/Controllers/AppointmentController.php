<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $appointment = Appointment::create([
            'user_details_id' => $r->user_details_id,
            'consent_form' => $r->consent_form,
            'enccode' => $r->enccode,
            'appointment_date' => $r->appointment_date,
            'appointment_time' => $r->appointment_time,
            'status' => $r->status,
            'created_at' => Carbon::now(),
        ]);

        if($appointment){
            $status = 'success';
            $message = 'Appointment Created!';
        }else{
            $status = 'failed';
            $message = 'Failed to create appointment!';
        }

        return json_encode([
            'status'=> $status,
            'message'=> $message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $r)
    {
        return Appointment::where([
            'user_details_id'=> $r->user_details_id,
            'status'=> 'A',
        ])->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Appointment $appointment)
    {
        $appointment = Appointment::where('id', $r->id)->update([
            'user_details_id' => $r->user_details_id,
            'consent_form' => $r->consent_form,
            'enccode' => $r->enccode,
            'appointment_date' => $r->appointment_date,
            'appointment_time' => $r->appointment_time,
            'status' => $r->status,
            'updated_at' => Carbon::now(),
        ]);

        if($appointment){
            $status = 'success';
            $message = 'Appointment Updated!';
        }else{
            $status = 'failed';
            $message = 'Failed to update appointment!';
        }

        return json_encode([
            'status'=> $status,
            'message'=> $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $r)
    {
        return Appointment::where('id', $r->id)->delete();
    }
}
