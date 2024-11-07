<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\InformedConsent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $consentform = json_encode($r->consent_form);
        $appointment = Appointment::create([
            'user_details_id' => $r->user_details_id,
            'consent_form' => $consentform,
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

    public function show_all_by_date_disabled(Request $r)
    {
        $bymonth = $r->date;
        $parsedDate = Carbon::parse($bymonth);
        $year = $parsedDate->year;
        $month = $parsedDate->month;

        // Fetch disabled times for the given month and year
        $disabled_times = DB::table('appointment')
            ->where('status', 2)
            ->whereYear('appointment_date', $year)
            ->whereMonth('appointment_date', $month)
            ->get();

        // Initialize an array to hold the result
        $disabled = [];

        // Loop through the fetched data and group by date
        foreach ($disabled_times as $disabled_time) {
            $date = $disabled_time->appointment_date; // Ensure it's a date string

            // Check if the date already exists in the array
            if (!isset($disabled[$date])) {
                $disabled[$date] = [
                    'date' => $date,
                    'available_time' => []
                ];
            }

            // Add the available time to the respective date
            $availableTime = $disabled_time->appointment_time;
            $disabled[$date]['available_time'][] = $availableTime;
        }

        // Return the result as an indexed array (not associative with date as key)
        return array_values($disabled); // Convert associative array to indexed array
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
