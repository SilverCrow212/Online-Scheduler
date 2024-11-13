<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
class PrintablesController extends Controller
{

    public function show(Request $r)
    {
        // return Holidays::all();
        $results = DB::table('user_details as ud')
            ->leftJoin('appointment as ap', 'ud.user_id', '=', 'ap.user_details_id')
            ->leftJoin('clinical_details as cd', 'ap.id', '=', 'cd.appointment_id')
            ->where('ud.user_id', 2)
            ->where('ap.status', 1)
            ->select(
                'ud.user_id',
                'ud.firstname',
                'ud.lastname',
                'ap.id as appointment_id',
                'ap.appointment_date',
                'ap.appointment_time',
                'ap.status as appointment_status',
                'cd.id as clinical_detail_id',
                'cd.services_rendered',
                'cd.tooth_number',
                'cd.medicine_prescribed',
                'cd.remarks'
            )
            ->get();

            return response()->json([
                'status' => 'success',
                'data' => $results,
            ], 200);
    }


}
