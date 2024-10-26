<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\InformedConsent;
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
    public function show_all(Request $r)
    {
        return Appointment::where([
            // 'status'=> 'A',
            'user_details_id'=> $r->user_details_id
        ])->get();
    }
    public function show_all_by_date(Request $r)
    {
        return Appointment::with('userDetails')
        ->where([
            // 'status'=> 'A',
            'appointment_date' => Carbon::parse($r->date)->format('Y-m-d')
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

    public function store_informed_consent(Request $r)
    {
        $informedConsent = InformedConsent::create([
            'user_details_id' => $r->user_details_id,
            'details' => json_encode($r->details),
            'dental_history' => json_encode($r->dentalHistory),
            'medical_history' => json_encode($r->medicalHistory),
            'vitals' => json_encode($r->vitals),
            'pre_consent' => json_encode($r->preconsent),
            'final_consent' => json_encode($r->finalconsent),
        ]);

        if($informedConsent){
            $status = 'success';
            $message = 'Consent Created!';
        }else{
            $status = 'failed';
            $message = 'Failed to create consent!';
        }

        return json_encode([
            'status'=> $status,
            'message'=> $message
        ]);
    }
    public function get_informed_consent($id)
    {
        $informedConsent = InformedConsent::findOrFail($id);

        return response()->json($informedConsent);
    }
}
