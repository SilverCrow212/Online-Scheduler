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
        $results = DB::table('user_details')
        ->join('appointment', 'appointment.user_details_id', '=', 'user_details.user_id')
        ->join('clinical_details', 'clinical_details.appointment_id', '=', 'appointment.id')
        ->where('appointment.status', 1)
        ->select('user_details.*', 'appointment.*', 'clinical_details.*')
        ->get();

            return response()->json([
                'status' => 'success',
                'data' => $results,
            ], 200);
    }


    public function exportReport(Request $r)
    {
        $inputDate = $r->date;  // Example input: '2024-11-14'

        // Parse the input date using Carbon
        $carbonDate = Carbon::parse($inputDate);
        $monthName = strtoupper($carbonDate->format('F'));
        // return $carbonDate->year;
        // return Holidays::all();
        $results = DB::table('user_details')
        ->join('appointment', 'appointment.user_details_id', '=', 'user_details.user_id')
        ->join('clinical_details', 'clinical_details.appointment_id', '=', 'appointment.id')
        ->where('appointment.status', 1)
        ->whereMonth('appointment.appointment_date', '=', $carbonDate->month)
        ->whereYear('appointment.appointment_date', '=', $carbonDate->year)
        ->get();
        // return $results;
        // legends = {
        //     PE:patients_examined,
        //     EE:enrollees_examined
        //     PT:patients_treated
        //     OP:oral_prolyphaxis
        //     EX:extraction
        //     PTO:permanent_tooth
        //     TTO:temporary_tooth
        //     FR:filling_restoration
        //     TFC:tooth_filled_comp
        //     TFG:tooth_filled_gic
        //     SE:sealant
        //     TAS:tooth_applied_sealant
        //     OT:other_treatment
        //     OHI:oral_health_instruction
        //     PR:patients_referred
        //     IC:issued_certificate
        // }
        $data = [
            //not yet placed
            '1' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '16' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],

            '2' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            //until here not yet placed
            '3' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '4' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '5'=>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '6' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '7' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '8'=>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '9' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '10'=>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '11' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '12'=>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '13' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '14' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            '15' =>
                ['SM18' => 0, 'SM25' => 0, 'SM35' => 0, 'SM45' => 0, 'SM55' => 0, 'SMT' => 0, 'SF18' => 0, 'SF25' => 0,
                'SF35' => 0, 'SF45' => 0, 'SF55' => 0, 'SFT' => 0, 'ST' => 0, 'CM13'=>0, 'CM18'=>0, 'CM25'=>0,
                'CM35'=>0, 'CM45'=>0, 'CM55'=>0, 'CMT'=>0, 'CF13'=>0, 'CF18'=>0, 'CF25'=>0, 'CF35'=>0, 'CF45'=>0,
                'CF55'=>0, 'CFT'=>0, 'CT'=>0, 'HM13'=>0, 'HM18'=>0, 'HMT'=>0, 'HF13'=>0, 'HF18'=>0, 'HFT'=>0, 'HT'=>0,
                'EM5'=>0, 'EM13'=>0, 'EF5'=>0, 'EMT'=>0, 'EF13'=>0, 'EFT'=>0, 'ET'=>0, 'DM0'=>0, 'DM5'=>0, 'DM13'=>0,
                'DM18'=>0, 'DM25'=>0, 'DM45'=>0, 'DM55'=>0, 'DMT'=>0, 'DF5'=>0, 'DF13'=>0, 'DF18'=>0, 'DF25'=>0, 'DF45'=>0,
                'DF55'=>0, 'DF66'=>0, 'DFT'=>0, 'DT'=>0, 'TM0'=>0, 'TM5'=>0, 'TM13'=>0, 'TM18'=>0, 'TM25'=>0, 'TM35'=>0,
                'TM45'=>0, 'TM55'=>0,'TM66'=>0, 'TMT'=>0, 'TMP'=>0, 'TF0'=>0, 'TF5'=>0, 'TF13'=>0, 'TF18'=>0, 'TF25'=>0,
                'TF35'=>0, 'TF45'=>0, 'TF55'=>0, 'TF66'=>0, 'TFT'=>0, 'TFP'=>0, 'TT'=>0
                ],
            ];


    // $data = {OP:{SM18:0}}
    // $prefix = 'S'
    // $sex = 'Male'
    // $decodedData = get id of services rendered

    // $objectId == 3
    //     OP
    //         $key based on first character which is S  + prefix of gender and age the break
        function process($data,$prefix, $sex, $age, $decodedData){
            $staffAge = [
                ['min'=>18, 'max'=>24],
                ['min'=>25, 'max'=>34],
                ['min'=>35, 'max'=>44],
                ['min'=>45, 'max'=>54],
                ['min'=>55, 'max'=>65]
            ];
            $collegeAge = [
                ['min'=>13, 'max'=>17],
                ['min'=>18, 'max'=>24],
                ['min'=>25, 'max'=>34],
                ['min'=>35, 'max'=>44],
                ['min'=>45, 'max'=>54],
                ['min'=>55, 'max'=>65],
            ];
            $HSAge = [
                ['min'=>13, 'max'=>17],
                ['min'=>18, 'max'=>24],
            ];
            $ElementaryAge = [
                ['min'=>5, 'max'=>12],
                ['min'=>13, 'max'=>17],
            ];
            $DependentAge = [
                ['min'=>5, 'max'=>12],
                ['min'=>13, 'max'=>17],
                ['min'=>18, 'max'=>24],
                ['min'=>25, 'max'=>44],
                ['min'=>45, 'max'=>54],
                ['min'=>55, 'max'=>65],
            ];
            $TotalAge = [
                ['min'=>0, 'max'=>5],
                ['min'=>5, 'max'=>12],
                ['min'=>18, 'max'=>24],
                ['min'=>25, 'max'=>34],
                ['min'=>35, 'max'=>44],
                ['min'=>45, 'max'=>54],
                ['min'=>55, 'max'=>65],
                ['min'=>66, 'max'=>150],
            ];
            $results = [];
            foreach ($decodedData as $objectId) {
                if (isset($data[$objectId->id])) {
                    $currentResults = [];

                    foreach ($data[$objectId->id] as $subKey => $value) {
                        if ($prefix == 'S') {
                            foreach ($staffAge as $ages) {
                                if ($age >= $ages['min'] && $age <= $ages['max']) {
                                    $currentResults[] = $prefix . 'T';
                                    $currentResults[] = $prefix . $sex . 'T';
                                    $currentResults[] = $prefix . $sex . $age;
                                    break 2;
                                }
                            }
                        }
                        if ($prefix == 'C') {
                            foreach ($collegeAge as $ages) {
                                if ($age >= $ages['min'] && $age <= $ages['max']) {
                                    $currentResults[] = $prefix . 'T';
                                    $currentResults[] = $prefix . $sex . 'T';
                                    $currentResults[] = $prefix . $sex . $age;
                                    break 2;
                                }
                            }
                        }
                        if ($prefix == 'H') {
                            foreach ($HSAge as $ages) {
                                if ($age >= $ages['min'] && $age <= $ages['max']) {
                                    $currentResults[] = $prefix . 'T';
                                    $currentResults[] = $prefix . $sex . 'T';
                                    $currentResults[] = $prefix . $sex . $age;
                                    break 2;
                                }
                            }
                        }
                        if ($prefix == 'E') {
                            foreach ($ElementaryAge as $ages) {
                                if ($age >= $ages['min'] && $age <= $ages['max']) {
                                    $currentResults[] = $prefix . 'T';
                                    $currentResults[] = $prefix . $sex . 'T';
                                    $currentResults[] = $prefix . $sex . $age;
                                    break 2;
                                }
                            }
                        }
                        if ($prefix == 'D') {
                            foreach ($DependentAge as $ages) {
                                if ($age >= $ages['min'] && $age <= $ages['max']) {
                                    $currentResults[] = $prefix . 'T';
                                    $currentResults[] = $prefix . $sex . 'T';
                                    $currentResults[] = $prefix . $sex . $age;
                                    break 2;
                                }
                            }
                        }
                        if ($prefix == 'T') {
                            foreach ($TotalAge as $ages) {
                                if ($age >= $ages['min'] && $age <= $ages['max']) {
                                    $currentResults[] = $prefix . 'T';
                                    $currentResults[] = $prefix . $sex . 'T';
                                    $currentResults[] = $prefix . $sex . $age;
                                    break 2;
                                }
                            }
                        }

                    }


                    if (!empty($currentResults)) {
                        $results[$objectId->id] = $currentResults;
                    }
                }
            }
            return $results;
        }

        foreach($results as $result){
            $age = $result->age;
            $sex = substr($result->sex, 0, 1);
            if($result->type==2 && $result->services_rendered){
                $decodedData = json_decode($result->services_rendered);
                $prefix = 'S';// substr($string, 0, 1);
                $test = process($data,$prefix, $sex, $age, $decodedData);
                foreach ($test as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                }
                $total = process($data,'T', $sex, $age, $decodedData);
                foreach ($total as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                    $male = ($data[$key]['TMT']/$data[$key]['TT']) * 100;
                    $data[$key]['TMP'] = round($male, 2);
                    $female = ($data[$key]['TFT']/$data[$key]['TT']) * 100;
                    $data[$key]['TFP'] = round($female, 2);
                }
            }
            if($result->type==1 && $result->services_rendered  && $result->employee_student_type == 1){
                $decodedData = json_decode($result->services_rendered);
                $prefix = 'C';// substr($string, 0, 1);
                $test = process($data,$prefix, $sex, $age, $decodedData);
                foreach ($test as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                }
                $total = process($data,'T', $sex, $age, $decodedData);
                foreach ($total as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                    $male = ($data[$key]['TMT']/$data[$key]['TT']) * 100;
                    $data[$key]['TMP'] = round($male, 2);
                    $female = ($data[$key]['TFT']/$data[$key]['TT']) * 100;
                    $data[$key]['TFP'] = round($female, 2);
                }
            }
            if($result->type==1 && $result->services_rendered  && $result->employee_student_type == 2){
                $decodedData = json_decode($result->services_rendered);
                $prefix = 'H';// substr($string, 0, 1);
                $test = process($data,$prefix, $sex, $age, $decodedData);
                foreach ($test as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                }
                $total = process($data,'T', $sex, $age, $decodedData);
                foreach ($total as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                    $male = ($data[$key]['TMT']/$data[$key]['TT']) * 100;
                    $data[$key]['TMP'] = round($male, 2);
                    $female = ($data[$key]['TFT']/$data[$key]['TT']) * 100;
                    $data[$key]['TFP'] = round($female, 2);
                }
            }
            if($result->type==1 && $result->services_rendered  && $result->employee_student_type == 3){
                $decodedData = json_decode($result->services_rendered);
                $prefix = 'E';// substr($string, 0, 1);
                $test = process($data,$prefix, $sex, $age, $decodedData);
                foreach ($test as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                }
                $total = process($data,'T', $sex, $age, $decodedData);
                foreach ($total as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                    $male = ($data[$key]['TMT']/$data[$key]['TT']) * 100;
                    $data[$key]['TMP'] = round($male, 2);
                    $female = ($data[$key]['TFT']/$data[$key]['TT']) * 100;
                    $data[$key]['TFP'] = round($female, 2);
                }
            }
            if($result->type==3 && $result->services_rendered ){
                $decodedData = json_decode($result->services_rendered);
                $prefix = 'D';// substr($string, 0, 1);
                $test = process($data,$prefix, $sex, $age, $decodedData);
                foreach ($test as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                }
                $total = process($data,'T', $sex, $age, $decodedData);
                foreach ($total as $key => $yes) {
                    foreach ($yes as $item) {
                        if (isset($data[$key][$item])) {
                            $data[$key][$item] += 1;
                        }
                    }
                    $male = ($data[$key]['TMT']/$data[$key]['TT']) * 100;
                    $data[$key]['TMP'] = round($male, 2);
                    $female = ($data[$key]['TFT']/$data[$key]['TT']) * 100;
                    $data[$key]['TFP'] = round($female, 2);
                }
            }
        }


        function transformDataGrouped($section, $prefixes) {
            $result = [];
            $currentGroup = [];

            foreach ($section as $key => $value) {
                // Include keys that start with any of the provided prefixes
                foreach ($prefixes as $prefix) {
                    if (substr($key, 0, 1) === $prefix) {
                        $currentGroup[$key] = $value;
                    }
                }
            }

            // If there are any remaining items in the group, add it to the result
            if (!empty($currentGroup)) {
                $result[] = $currentGroup;
            }

            return $result;
        }

        // Create the final result structure
        $response = [
            'DATE' => $monthName . ' ' .$carbonDate->year,
            'PES' => transformDataGrouped($data['1'], ['S', 'C']),
            'PEH' => transformDataGrouped($data['1'], ['H','E','D']),
            'PET' => transformDataGrouped($data['1'], ['T']),
            'PTS' => transformDataGrouped($data['2'], ['S', 'C']),
            'PTH' => transformDataGrouped($data['2'], ['H','E','D']),
            'PTT' => transformDataGrouped($data['2'], ['T']),
            'EES' => transformDataGrouped($data['16'], ['S', 'C']),
            'EEH' => transformDataGrouped($data['16'], ['H','E','D']),
            'EET' => transformDataGrouped($data['16'], ['T']),
            'OPS' => transformDataGrouped($data['3'], ['S', 'C']),
            'OPH' => transformDataGrouped($data['3'], ['H','E','D']),
            'OPT' => transformDataGrouped($data['3'], ['T']),
            'EXS' => transformDataGrouped($data['4'], ['S', 'C']),
            'EXH' => transformDataGrouped($data['4'], ['H','E','D']),
            'EXT' => transformDataGrouped($data['4'], ['T']),
            'PTOS' => transformDataGrouped($data['5'], ['S', 'C']),
            'PTOH' => transformDataGrouped($data['5'], ['H','E','D']),
            'PTOT' => transformDataGrouped($data['5'], ['T']),
            'TTOS' => transformDataGrouped($data['6'], ['S', 'C']),
            'TTOH' => transformDataGrouped($data['6'], ['H','E','D']),
            'TTOT' => transformDataGrouped($data['6'], ['T']),
            'FRS' => transformDataGrouped($data['7'], ['S', 'C']),
            'FRH' => transformDataGrouped($data['7'], ['H','E','D']),
            'FRT' => transformDataGrouped($data['7'], ['T']),
            'TFCS' => transformDataGrouped($data['8'], ['S', 'C']),
            'TFCH' => transformDataGrouped($data['8'], ['H','E','D']),
            'TFCT' => transformDataGrouped($data['8'], ['T']),
            'TFGS' => transformDataGrouped($data['9'], ['S', 'C']),
            'TFGH' => transformDataGrouped($data['9'], ['H','E','D']),
            'TFGT' => transformDataGrouped($data['9'], ['T']),
            'SES' => transformDataGrouped($data['10'], ['S', 'C']),
            'SEH' => transformDataGrouped($data['10'], ['H','E','D']),
            'SET' => transformDataGrouped($data['10'], ['T']),
            'TASS' => transformDataGrouped($data['11'], ['S', 'C']),
            'TASH' => transformDataGrouped($data['11'], ['H','E','D']),
            'TAST' => transformDataGrouped($data['11'], ['T']),
            'OTS' => transformDataGrouped($data['12'], ['S', 'C']),
            'OTH' => transformDataGrouped($data['12'], ['H','E','D']),
            'OTT' => transformDataGrouped($data['12'], ['T']),
            'OHIS' => transformDataGrouped($data['13'], ['S', 'C']),
            'OHIH' => transformDataGrouped($data['13'], ['H','E','D']),
            'OHIT' => transformDataGrouped($data['13'], ['T']),
            'PRS' => transformDataGrouped($data['14'], ['S', 'C']),
            'PRH' => transformDataGrouped($data['14'], ['H','E','D']),
            'PRT' => transformDataGrouped($data['14'], ['T']),
            'ICS' => transformDataGrouped($data['15'], ['S', 'C']),
            'ICH' => transformDataGrouped($data['15'], ['H','E','D']),
            'ICT' => transformDataGrouped($data['15'], ['T']),
        ];
            return response()->json(
                $response
            );
        }
    }
