<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
class PrintablesControllerOG extends Controller
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
        // return Holidays::all();
        $results = DB::table('user_details')
        ->join('appointment', 'appointment.user_details_id', '=', 'user_details.user_id')
        ->join('clinical_details', 'clinical_details.appointment_id', '=', 'appointment.id')
        ->where('appointment.status', 1)
        ->select('user_details.*', 'appointment.*', 'clinical_details.*')
        ->get();

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
            'PE' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'EE' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],

            'PT' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            //until here not yet placed
            'OP' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'EX' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'PTO'=>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'TTO' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'FR' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'TFC'=>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'TFG' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'SE'=>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'TAS' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'OT'=>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'OHI' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'PR' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'IC' =>
                [
                    'SM18' => 0,
                    'SM25' => 0,
                    'SM35' => 0,
                    'SM45' => 0,
                    'SM55' => 0,
                    'SMT' => 0,
                    'SF18' => 0,
                    'SF25' => 0,
                    'SF35' => 0,
                    'SF45' => 0,
                    'SF55' => 0,
                    'SFT' => 0,
                    'ST' => 0,
                    'CM13'=>0,
                    'CM18'=>0,
                    'CM25'=>0,
                    'CM35'=>0,
                    'CM45'=>0,
                    'CM55'=>0,
                    'CMT'=>0,
                    'CF13'=>0,
                    'CF18'=>0,
                    'CF25'=>0,
                    'CF35'=>0,
                    'CF45'=>0,
                    'CF55'=>0,
                    'CFT'=>0,
                    'CT'=>0,
                    'HM13'=>0,
                    'HM18'=>0,
                    'HMT'=>0,
                    'HF13'=>0,
                    'HF18'=>0,
                    'HFT'=>0,
                    'HT'=>0,
                    'EM5'=>0,
                    'EM13'=>0,
                    'EF5'=>0,
                    'EMT'=>0,
                    'EF13'=>0,
                    'EFT'=>0,
                    'ET'=>0,
                    'DM0'=>0,
                    'DM5'=>0,
                    'DM13'=>0,
                    'DM18'=>0,
                    'DM25'=>0,
                    'DM45'=>0,
                    'DM55'=>0,
                    'DMT'=>0,
                    'DF5'=>0,
                    'DF13'=>0,
                    'DF18'=>0,
                    'DF25'=>0,
                    'DF45'=>0,
                    'DF55'=>0,
                    'DF66'=>0,
                    'DFT'=>0,
                    'DT'=>0,
                ],
            ];


        foreach($results as $result){
            if($result->type==2 && $result->services_rendered){
                foreach(json_decode($result->services_rendered) as $test){
                    // start of oral prophylaxis
                    if($result->age>=18 && $result->age <=24 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['SM18'] +=1;
                            $data['OP']['SMT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                        else{
                            $data['OP']['SF18'] +=1;
                            $data['OP']['SFT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['SM25'] +=1;
                            $data['OP']['SMT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                        else{
                            $data['OP']['SF25'] +=1;
                            $data['OP']['SFT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['SM35'] +=1;
                            $data['OP']['SMT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                        else{
                            $data['OP']['SF35'] +=1;
                            $data['OP']['SFT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['SM45'] +=1;
                            $data['OP']['SMT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                        else{
                            $data['OP']['SF45'] +=1;
                            $data['OP']['SFT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                    }
                    ///end of oral prophylaxis
                    // start of EX
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['SM18'] +=1;
                            $data['EX']['SMT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                        else{
                            $data['EX']['SF18'] +=1;
                            $data['EX']['SFT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['SM25'] +=1;
                            $data['EX']['SMT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                        else{
                            $data['EX']['SF25'] +=1;
                            $data['EX']['SFT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['SM35'] +=1;
                            $data['EX']['SMT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                        else{
                            $data['EX']['SF35'] +=1;
                            $data['EX']['SFT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['SM45'] +=1;
                            $data['EX']['SMT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                        else{
                            $data['EX']['SF45'] +=1;
                            $data['EX']['SFT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                    }
                    ///end of EX
                    // start of permanent tooth
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['SM18'] +=1;
                            $data['PTO']['SMT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                        else{
                            $data['PTO']['SF18'] +=1;
                            $data['PTO']['SFT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['SM25'] +=1;
                            $data['PTO']['SMT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                        else{
                            $data['PTO']['SF25'] +=1;
                            $data['PTO']['SFT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['SM35'] +=1;
                            $data['PTO']['SMT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                        else{
                            $data['PTO']['SF35'] +=1;
                            $data['PTO']['SFT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['SM45'] +=1;
                            $data['PTO']['SMT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                        else{
                            $data['PTO']['SF45'] +=1;
                            $data['PTO']['SFT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                    }
                    ///end of permanent tooth
                    // start of temporary tooth
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['SM18'] +=1;
                            $data['TTO']['SMT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                        else{
                            $data['TTO']['SF18'] +=1;
                            $data['TTO']['SFT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['SM25'] +=1;
                            $data['TTO']['SMT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                        else{
                            $data['TTO']['SF25'] +=1;
                            $data['TTO']['SFT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['SM35'] +=1;
                            $data['TTO']['SMT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                        else{
                            $data['TTO']['SF35'] +=1;
                            $data['TTO']['SFT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['SM45'] +=1;
                            $data['TTO']['SMT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                        else{
                            $data['TTO']['SF45'] +=1;
                            $data['TTO']['SFT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                    }
                    ///end of temporary tooth
                    // start of filling/restoration
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['SM18'] +=1;
                            $data['FR']['SMT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                        else{
                            $data['FR']['SF18'] +=1;
                            $data['FR']['SFT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['SM25'] +=1;
                            $data['FR']['SMT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                        else{
                            $data['FR']['SF25'] +=1;
                            $data['FR']['SFT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['SM35'] +=1;
                            $data['FR']['SMT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                        else{
                            $data['FR']['SF35'] +=1;
                            $data['FR']['SFT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['SM45'] +=1;
                            $data['FR']['SMT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                        else{
                            $data['FR']['SF45'] +=1;
                            $data['FR']['SFT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                    }
                    ///end of filling/restoration
                    // start of teeth filled with comp
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['SM18'] +=1;
                            $data['TFC']['SMT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                        else{
                            $data['TFC']['SF18'] +=1;
                            $data['TFC']['SFT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['SM25'] +=1;
                            $data['TFC']['SMT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                        else{
                            $data['TFC']['SF25'] +=1;
                            $data['TFC']['SFT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['SM35'] +=1;
                            $data['TFC']['SMT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                        else{
                            $data['TFC']['SF35'] +=1;
                            $data['TFC']['SFT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['SM45'] +=1;
                            $data['TFC']['SMT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                        else{
                            $data['TFC']['SF45'] +=1;
                            $data['TFC']['SFT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                    }
                    ///end of teeth filled with comp
                    // start of teeth filled with gic
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['SM18'] +=1;
                            $data['TFG']['SMT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                        else{
                            $data['TFG']['SF18'] +=1;
                            $data['TFG']['SFT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['SM25'] +=1;
                            $data['TFG']['SMT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                        else{
                            $data['TFG']['SF25'] +=1;
                            $data['TFG']['SFT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['SM35'] +=1;
                            $data['TFG']['SMT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                        else{
                            $data['TFG']['SF35'] +=1;
                            $data['TFG']['SFT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['SM45'] +=1;
                            $data['TFG']['SMT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                        else{
                            $data['TFG']['SF45'] +=1;
                            $data['TFG']['SFT'] +=1;
                        }
                    }
                    ///end of teeth filled with gic
                    // start of SE
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['SM18'] +=1;
                            $data['SE']['SMT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                        else{
                            $data['SE']['SF18'] +=1;
                            $data['SE']['SFT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['SM25'] +=1;
                            $data['SE']['SMT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                        else{
                            $data['SE']['SF25'] +=1;
                            $data['SE']['SFT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['SM35'] +=1;
                            $data['SE']['SMT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                        else{
                            $data['SE']['SF35'] +=1;
                            $data['SE']['SFT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['SM45'] +=1;
                            $data['SE']['SMT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                        else{
                            $data['SE']['SF45'] +=1;
                            $data['SE']['SFT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                    }
                    ///end of SE
                    // start of Tooth Applied w/ SE
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['SM18'] +=1;
                            $data['TAS']['SMT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                        else{
                            $data['TAS']['SF18'] +=1;
                            $data['TAS']['SFT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['SM25'] +=1;
                            $data['TAS']['SMT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                        else{
                            $data['TAS']['SF25'] +=1;
                            $data['TAS']['SFT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['SM35'] +=1;
                            $data['TAS']['SMT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                        else{
                            $data['TAS']['SF35'] +=1;
                            $data['TAS']['SFT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['SM45'] +=1;
                            $data['TAS']['SMT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                        else{
                            $data['TAS']['SF45'] +=1;
                            $data['TAS']['SFT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                    }
                    ///end of Tooth Applied w/ SE
                    // start of Other Treatment
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['SM18'] +=1;
                            $data['OT']['SMT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                        else{
                            $data['OT']['SF18'] +=1;
                            $data['OT']['SFT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['SM25'] +=1;
                            $data['OT']['SMT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                        else{
                            $data['OT']['SF25'] +=1;
                            $data['OT']['SFT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['SM35'] +=1;
                            $data['OT']['SMT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                        else{
                            $data['OT']['SF35'] +=1;
                            $data['OT']['SFT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['SM45'] +=1;
                            $data['OT']['SMT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                        else{
                            $data['OT']['SF45'] +=1;
                            $data['OT']['SFT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                    }
                    ///end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['SM18'] +=1;
                            $data['OHI']['SMT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                        else{
                            $data['OHI']['SF18'] +=1;
                            $data['OHI']['SFT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['SM25'] +=1;
                            $data['OHI']['SMT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                        else{
                            $data['OHI']['SF25'] +=1;
                            $data['OHI']['SFT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['SM35'] +=1;
                            $data['OHI']['SMT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                        else{
                            $data['OHI']['SF35'] +=1;
                            $data['OHI']['SFT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['SM45'] +=1;
                            $data['OHI']['SMT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                        else{
                            $data['OHI']['SF45'] +=1;
                            $data['OHI']['SFT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                    }
                    ///end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['SM18'] +=1;
                            $data['PR']['SMT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                        else{
                            $data['PR']['SF18'] +=1;
                            $data['PR']['SFT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['SM25'] +=1;
                            $data['PR']['SMT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                        else{
                            $data['PR']['SF25'] +=1;
                            $data['PR']['SFT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['SM35'] +=1;
                            $data['PR']['SMT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                        else{
                            $data['PR']['SF35'] +=1;
                            $data['PR']['SFT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['SM45'] +=1;
                            $data['PR']['SMT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                        else{
                            $data['PR']['SF45'] +=1;
                            $data['PR']['SFT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                    }
                    ///end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['SM18'] +=1;
                            $data['IC']['SMT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                        else{
                            $data['IC']['SF18'] +=1;
                            $data['IC']['SFT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['SM25'] +=1;
                            $data['IC']['SMT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                        else{
                            $data['IC']['SF25'] +=1;
                            $data['IC']['SFT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['SM35'] +=1;
                            $data['IC']['SMT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                        else{
                            $data['IC']['SF35'] +=1;
                            $data['IC']['SFT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['SM45'] +=1;
                            $data['IC']['SMT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                        else{
                            $data['IC']['SF45'] +=1;
                            $data['IC']['SFT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                    }
                    ///end of Issuance of Med Cert
                }
            } foreach($results as $result){
            if($result->type==2 && $result->services_rendered){
                foreach(json_decode($result->services_rendered) as $test){
                    // start of oral prophylaxis
                    if($result->age>=18 && $result->age <=24 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['SM18'] +=1;
                            $data['OP']['SMT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                        else{
                            $data['OP']['SF18'] +=1;
                            $data['OP']['SFT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['SM25'] +=1;
                            $data['OP']['SMT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                        else{
                            $data['OP']['SF25'] +=1;
                            $data['OP']['SFT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['SM35'] +=1;
                            $data['OP']['SMT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                        else{
                            $data['OP']['SF35'] +=1;
                            $data['OP']['SFT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['SM45'] +=1;
                            $data['OP']['SMT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                        else{
                            $data['OP']['SF45'] +=1;
                            $data['OP']['SFT'] +=1;
                            $data['OP']['ST'] +=1;
                        }
                    }
                    ///end of oral prophylaxis
                    // start of EX
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['SM18'] +=1;
                            $data['EX']['SMT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                        else{
                            $data['EX']['SF18'] +=1;
                            $data['EX']['SFT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['SM25'] +=1;
                            $data['EX']['SMT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                        else{
                            $data['EX']['SF25'] +=1;
                            $data['EX']['SFT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['SM35'] +=1;
                            $data['EX']['SMT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                        else{
                            $data['EX']['SF35'] +=1;
                            $data['EX']['SFT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['SM45'] +=1;
                            $data['EX']['SMT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                        else{
                            $data['EX']['SF45'] +=1;
                            $data['EX']['SFT'] +=1;
                            $data['EX']['ST'] +=1;
                        }
                    }
                    ///end of EX
                    // start of permanent tooth
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['SM18'] +=1;
                            $data['PTO']['SMT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                        else{
                            $data['PTO']['SF18'] +=1;
                            $data['PTO']['SFT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['SM25'] +=1;
                            $data['PTO']['SMT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                        else{
                            $data['PTO']['SF25'] +=1;
                            $data['PTO']['SFT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['SM35'] +=1;
                            $data['PTO']['SMT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                        else{
                            $data['PTO']['SF35'] +=1;
                            $data['PTO']['SFT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['SM45'] +=1;
                            $data['PTO']['SMT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                        else{
                            $data['PTO']['SF45'] +=1;
                            $data['PTO']['SFT'] +=1;
                            $data['PTO']['ST'] +=1;
                        }
                    }
                    ///end of permanent tooth
                    // start of temporary tooth
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['SM18'] +=1;
                            $data['TTO']['SMT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                        else{
                            $data['TTO']['SF18'] +=1;
                            $data['TTO']['SFT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['SM25'] +=1;
                            $data['TTO']['SMT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                        else{
                            $data['TTO']['SF25'] +=1;
                            $data['TTO']['SFT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['SM35'] +=1;
                            $data['TTO']['SMT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                        else{
                            $data['TTO']['SF35'] +=1;
                            $data['TTO']['SFT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['SM45'] +=1;
                            $data['TTO']['SMT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                        else{
                            $data['TTO']['SF45'] +=1;
                            $data['TTO']['SFT'] +=1;
                            $data['TTO']['ST'] +=1;
                        }
                    }
                    ///end of temporary tooth
                    // start of filling/restoration
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['SM18'] +=1;
                            $data['FR']['SMT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                        else{
                            $data['FR']['SF18'] +=1;
                            $data['FR']['SFT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['SM25'] +=1;
                            $data['FR']['SMT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                        else{
                            $data['FR']['SF25'] +=1;
                            $data['FR']['SFT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['SM35'] +=1;
                            $data['FR']['SMT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                        else{
                            $data['FR']['SF35'] +=1;
                            $data['FR']['SFT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['SM45'] +=1;
                            $data['FR']['SMT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                        else{
                            $data['FR']['SF45'] +=1;
                            $data['FR']['SFT'] +=1;
                            $data['FR']['ST'] +=1;
                        }
                    }
                    ///end of filling/restoration
                    // start of teeth filled with comp
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['SM18'] +=1;
                            $data['TFC']['SMT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                        else{
                            $data['TFC']['SF18'] +=1;
                            $data['TFC']['SFT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['SM25'] +=1;
                            $data['TFC']['SMT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                        else{
                            $data['TFC']['SF25'] +=1;
                            $data['TFC']['SFT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['SM35'] +=1;
                            $data['TFC']['SMT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                        else{
                            $data['TFC']['SF35'] +=1;
                            $data['TFC']['SFT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['SM45'] +=1;
                            $data['TFC']['SMT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                        else{
                            $data['TFC']['SF45'] +=1;
                            $data['TFC']['SFT'] +=1;
                            $data['TFC']['ST'] +=1;
                        }
                    }
                    ///end of teeth filled with comp
                    // start of teeth filled with gic
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['SM18'] +=1;
                            $data['TFG']['SMT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                        else{
                            $data['TFG']['SF18'] +=1;
                            $data['TFG']['SFT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['SM25'] +=1;
                            $data['TFG']['SMT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                        else{
                            $data['TFG']['SF25'] +=1;
                            $data['TFG']['SFT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['SM35'] +=1;
                            $data['TFG']['SMT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                        else{
                            $data['TFG']['SF35'] +=1;
                            $data['TFG']['SFT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['SM45'] +=1;
                            $data['TFG']['SMT'] +=1;
                            $data['TFG']['ST'] +=1;
                        }
                        else{
                            $data['TFG']['SF45'] +=1;
                            $data['TFG']['SFT'] +=1;
                        }
                    }
                    ///end of teeth filled with gic
                    // start of SE
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['SM18'] +=1;
                            $data['SE']['SMT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                        else{
                            $data['SE']['SF18'] +=1;
                            $data['SE']['SFT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['SM25'] +=1;
                            $data['SE']['SMT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                        else{
                            $data['SE']['SF25'] +=1;
                            $data['SE']['SFT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['SM35'] +=1;
                            $data['SE']['SMT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                        else{
                            $data['SE']['SF35'] +=1;
                            $data['SE']['SFT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['SM45'] +=1;
                            $data['SE']['SMT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                        else{
                            $data['SE']['SF45'] +=1;
                            $data['SE']['SFT'] +=1;
                            $data['SE']['ST'] +=1;
                        }
                    }
                    ///end of SE
                    // start of Tooth Applied w/ SE
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['SM18'] +=1;
                            $data['TAS']['SMT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                        else{
                            $data['TAS']['SF18'] +=1;
                            $data['TAS']['SFT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['SM25'] +=1;
                            $data['TAS']['SMT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                        else{
                            $data['TAS']['SF25'] +=1;
                            $data['TAS']['SFT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['SM35'] +=1;
                            $data['TAS']['SMT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                        else{
                            $data['TAS']['SF35'] +=1;
                            $data['TAS']['SFT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['SM45'] +=1;
                            $data['TAS']['SMT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                        else{
                            $data['TAS']['SF45'] +=1;
                            $data['TAS']['SFT'] +=1;
                            $data['TAS']['ST'] +=1;
                        }
                    }
                    ///end of Tooth Applied w/ SE
                    // start of Other Treatment
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['SM18'] +=1;
                            $data['OT']['SMT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                        else{
                            $data['OT']['SF18'] +=1;
                            $data['OT']['SFT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['SM25'] +=1;
                            $data['OT']['SMT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                        else{
                            $data['OT']['SF25'] +=1;
                            $data['OT']['SFT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['SM35'] +=1;
                            $data['OT']['SMT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                        else{
                            $data['OT']['SF35'] +=1;
                            $data['OT']['SFT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['SM45'] +=1;
                            $data['OT']['SMT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                        else{
                            $data['OT']['SF45'] +=1;
                            $data['OT']['SFT'] +=1;
                            $data['OT']['ST'] +=1;
                        }
                    }
                    ///end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['SM18'] +=1;
                            $data['OHI']['SMT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                        else{
                            $data['OHI']['SF18'] +=1;
                            $data['OHI']['SFT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['SM25'] +=1;
                            $data['OHI']['SMT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                        else{
                            $data['OHI']['SF25'] +=1;
                            $data['OHI']['SFT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['SM35'] +=1;
                            $data['OHI']['SMT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                        else{
                            $data['OHI']['SF35'] +=1;
                            $data['OHI']['SFT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['SM45'] +=1;
                            $data['OHI']['SMT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                        else{
                            $data['OHI']['SF45'] +=1;
                            $data['OHI']['SFT'] +=1;
                            $data['OHI']['ST'] +=1;
                        }
                    }
                    ///end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['SM18'] +=1;
                            $data['PR']['SMT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                        else{
                            $data['PR']['SF18'] +=1;
                            $data['PR']['SFT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['SM25'] +=1;
                            $data['PR']['SMT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                        else{
                            $data['PR']['SF25'] +=1;
                            $data['PR']['SFT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['SM35'] +=1;
                            $data['PR']['SMT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                        else{
                            $data['PR']['SF35'] +=1;
                            $data['PR']['SFT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['SM45'] +=1;
                            $data['PR']['SMT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                        else{
                            $data['PR']['SF45'] +=1;
                            $data['PR']['SFT'] +=1;
                            $data['PR']['ST'] +=1;
                        }
                    }
                    ///end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['SM18'] +=1;
                            $data['IC']['SMT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                        else{
                            $data['IC']['SF18'] +=1;
                            $data['IC']['SFT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['SM25'] +=1;
                            $data['IC']['SMT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                        else{
                            $data['IC']['SF25'] +=1;
                            $data['IC']['SFT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['SM35'] +=1;
                            $data['IC']['SMT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                        else{
                            $data['IC']['SF35'] +=1;
                            $data['IC']['SFT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['SM45'] +=1;
                            $data['IC']['SMT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                        else{
                            $data['IC']['SF45'] +=1;
                            $data['IC']['SFT'] +=1;
                            $data['IC']['ST'] +=1;
                        }
                    }
                    ///end of Issuance of Med Cert
                }
            }
            if($result->type==1 && $result->services_rendered && $result->employee_student_type == 1){
                foreach(json_decode($result->services_rendered) as $test){
                    // start of oral prophylaxis
                    if($result->age>=13 && $result->age <=17 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['CM13'] +=1;
                            $data['OP']['CMT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                        else{
                            $data['OP']['CF13'] +=1;
                            $data['OP']['CFT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['CM18'] +=1;
                            $data['OP']['CMT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                        else{
                            $data['OP']['CF18'] +=1;
                            $data['OP']['CFT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['CM25'] +=1;
                            $data['OP']['CMT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                        else{
                            $data['OP']['CF25'] +=1;
                            $data['OP']['CFT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['CM35'] +=1;
                            $data['OP']['CMT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                        else{
                            $data['OP']['CF35'] +=1;
                            $data['OP']['CFT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['CM45'] +=1;
                            $data['OP']['CMT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                        else{
                            $data['OP']['CF45'] +=1;
                            $data['OP']['CFT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['CM55'] +=1;
                            $data['OP']['CMT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                        else{
                            $data['OP']['CF55'] +=1;
                            $data['OP']['CFT'] +=1;
                            $data['OP']['CT'] +=1;
                        }
                    }
                    // end of oral prophylaxis
                    // start of EX
                    if($result->age>=13 && $result->age <=17 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['CM13'] +=1;
                            $data['EX']['CMT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                        else{
                            $data['EX']['CF13'] +=1;
                            $data['EX']['CFT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['CM18'] +=1;
                            $data['EX']['CMT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                        else{
                            $data['EX']['CF18'] +=1;
                            $data['EX']['CFT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['CM25'] +=1;
                            $data['EX']['CMT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                        else{
                            $data['EX']['CF25'] +=1;
                            $data['EX']['CFT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['CM35'] +=1;
                            $data['EX']['CMT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                        else{
                            $data['EX']['CF35'] +=1;
                            $data['EX']['CFT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['CM45'] +=1;
                            $data['EX']['CMT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                        else{
                            $data['EX']['CF45'] +=1;
                            $data['EX']['CFT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['CM55'] +=1;
                            $data['EX']['CMT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                        else{
                            $data['EX']['CF55'] +=1;
                            $data['EX']['CFT'] +=1;
                            $data['EX']['CT'] +=1;
                        }
                    }
                    // end of EX
                    // start of Permanent Tooth
                    if($result->age>=13 && $result->age <=17 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['CM13'] +=1;
                            $data['PTO']['CMT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                        else{
                            $data['PTO']['CF13'] +=1;
                            $data['PTO']['CFT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['CM18'] +=1;
                            $data['PTO']['CMT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                        else{
                            $data['PTO']['CF18'] +=1;
                            $data['PTO']['CFT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['CM25'] +=1;
                            $data['PTO']['CMT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                        else{
                            $data['PTO']['CF25'] +=1;
                            $data['PTO']['CFT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['CM35'] +=1;
                            $data['PTO']['CMT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                        else{
                            $data['PTO']['CF35'] +=1;
                            $data['PTO']['CFT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['CM45'] +=1;
                            $data['PTO']['CMT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                        else{
                            $data['PTO']['CF45'] +=1;
                            $data['PTO']['CFT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['CM55'] +=1;
                            $data['PTO']['CMT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                        else{
                            $data['PTO']['CF55'] +=1;
                            $data['PTO']['CFT'] +=1;
                            $data['PTO']['CT'] +=1;
                        }
                    }
                    // end of Permanent Tooth
                    // start of Temporary Tooth
                    if($result->age>=13 && $result->age <=17 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['CM13'] +=1;
                            $data['TTO']['CMT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                        else{
                            $data['TTO']['CF13'] +=1;
                            $data['TTO']['CFT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['CM18'] +=1;
                            $data['TTO']['CMT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                        else{
                            $data['TTO']['CF18'] +=1;
                            $data['TTO']['CFT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['CM25'] +=1;
                            $data['TTO']['CMT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                        else{
                            $data['TTO']['CF25'] +=1;
                            $data['TTO']['CFT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['CM35'] +=1;
                            $data['TTO']['CMT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                        else{
                            $data['TTO']['CF35'] +=1;
                            $data['TTO']['CFT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['CM45'] +=1;
                            $data['TTO']['CMT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                        else{
                            $data['TTO']['CF45'] +=1;
                            $data['TTO']['CFT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['CM55'] +=1;
                            $data['TTO']['CMT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                        else{
                            $data['TTO']['CF55'] +=1;
                            $data['TTO']['CFT'] +=1;
                            $data['TTO']['CT'] +=1;
                        }
                    }
                    // end of Temporary Tooth
                    // start of Filling/Restoration
                    if($result->age>=13 && $result->age <=17 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['CM13'] +=1;
                            $data['FR']['CMT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                        else{
                            $data['FR']['CF13'] +=1;
                            $data['FR']['CFT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['CM18'] +=1;
                            $data['FR']['CMT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                        else{
                            $data['FR']['CF18'] +=1;
                            $data['FR']['CFT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['CM25'] +=1;
                            $data['FR']['CMT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                        else{
                            $data['FR']['CF25'] +=1;
                            $data['FR']['CFT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['CM35'] +=1;
                            $data['FR']['CMT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                        else{
                            $data['FR']['CF35'] +=1;
                            $data['FR']['CFT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['CM45'] +=1;
                            $data['FR']['CMT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                        else{
                            $data['FR']['CF45'] +=1;
                            $data['FR']['CFT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['CM55'] +=1;
                            $data['FR']['CMT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                        else{
                            $data['FR']['CF55'] +=1;
                            $data['FR']['CFT'] +=1;
                            $data['FR']['CT'] +=1;
                        }
                    }
                    // end of Filling/Restoration
                    // start of Tooth filled w/ Comp
                    if($result->age>=13 && $result->age <=17 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['CM13'] +=1;
                            $data['TFC']['CMT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                        else{
                            $data['TFC']['CF13'] +=1;
                            $data['TFC']['CFT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['CM18'] +=1;
                            $data['TFC']['CMT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                        else{
                            $data['TFC']['CF18'] +=1;
                            $data['TFC']['CFT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['CM25'] +=1;
                            $data['TFC']['CMT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                        else{
                            $data['TFC']['CF25'] +=1;
                            $data['TFC']['CFT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['CM35'] +=1;
                            $data['TFC']['CMT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                        else{
                            $data['TFC']['CF35'] +=1;
                            $data['TFC']['CFT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['CM45'] +=1;
                            $data['TFC']['CMT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                        else{
                            $data['TFC']['CF45'] +=1;
                            $data['TFC']['CFT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['CM55'] +=1;
                            $data['TFC']['CMT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                        else{
                            $data['TFC']['CF55'] +=1;
                            $data['TFC']['CFT'] +=1;
                            $data['TFC']['CT'] +=1;
                        }
                    }
                    // end of Tooth filled w/ Comp
                    // start of Tooth filled w/ GIC
                    if($result->age>=13 && $result->age <=17 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['CM13'] +=1;
                            $data['TFG']['CMT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                        else{
                            $data['TFG']['CF13'] +=1;
                            $data['TFG']['CFT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['CM18'] +=1;
                            $data['TFG']['CMT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                        else{
                            $data['TFG']['CF18'] +=1;
                            $data['TFG']['CFT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['CM25'] +=1;
                            $data['TFG']['CMT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                        else{
                            $data['TFG']['CF25'] +=1;
                            $data['TFG']['CFT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['CM35'] +=1;
                            $data['TFG']['CMT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                        else{
                            $data['TFG']['CF35'] +=1;
                            $data['TFG']['CFT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['CM45'] +=1;
                            $data['TFG']['CMT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                        else{
                            $data['TFG']['CF45'] +=1;
                            $data['TFG']['CFT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['CM55'] +=1;
                            $data['TFG']['CMT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                        else{
                            $data['TFG']['CF55'] +=1;
                            $data['TFG']['CFT'] +=1;
                            $data['TFG']['CT'] +=1;
                        }
                    }
                    // end of Tooth filled w/ GIC
                    // start of SE
                    if($result->age>=13 && $result->age <=17 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['CM13'] +=1;
                            $data['SE']['CMT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                        else{
                            $data['SE']['CF13'] +=1;
                            $data['SE']['CFT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['CM18'] +=1;
                            $data['SE']['CMT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                        else{
                            $data['SE']['CF18'] +=1;
                            $data['SE']['CFT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['CM25'] +=1;
                            $data['SE']['CMT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                        else{
                            $data['SE']['CF25'] +=1;
                            $data['SE']['CFT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['CM35'] +=1;
                            $data['SE']['CMT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                        else{
                            $data['SE']['CF35'] +=1;
                            $data['SE']['CFT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['CM45'] +=1;
                            $data['SE']['CMT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                        else{
                            $data['SE']['CF45'] +=1;
                            $data['SE']['CFT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['CM55'] +=1;
                            $data['SE']['CMT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                        else{
                            $data['SE']['CF55'] +=1;
                            $data['SE']['CFT'] +=1;
                            $data['SE']['CT'] +=1;
                        }
                    }
                    // end of SE
                    // start of Tooth Applied w/ SE
                    if($result->age>=13 && $result->age <=17 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['CM13'] +=1;
                            $data['TAS']['CMT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                        else{
                            $data['TAS']['CF13'] +=1;
                            $data['TAS']['CFT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['CM18'] +=1;
                            $data['TAS']['CMT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                        else{
                            $data['TAS']['CF18'] +=1;
                            $data['TAS']['CFT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['CM25'] +=1;
                            $data['TAS']['CMT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                        else{
                            $data['TAS']['CF25'] +=1;
                            $data['TAS']['CFT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['CM35'] +=1;
                            $data['TAS']['CMT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                        else{
                            $data['TAS']['CF35'] +=1;
                            $data['TAS']['CFT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['CM45'] +=1;
                            $data['TAS']['CMT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                        else{
                            $data['TAS']['CF45'] +=1;
                            $data['TAS']['CFT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['CM55'] +=1;
                            $data['TAS']['CMT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                        else{
                            $data['TAS']['CF55'] +=1;
                            $data['TAS']['CFT'] +=1;
                            $data['TAS']['CT'] +=1;
                        }
                    }
                    // end of Tooth Applied w/ SE
                    // start of Other Treatment
                    if($result->age>=13 && $result->age <=17 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['CM13'] +=1;
                            $data['OT']['CMT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                        else{
                            $data['OT']['CF13'] +=1;
                            $data['OT']['CFT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['CM18'] +=1;
                            $data['OT']['CMT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                        else{
                            $data['OT']['CF18'] +=1;
                            $data['OT']['CFT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['CM25'] +=1;
                            $data['OT']['CMT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                        else{
                            $data['OT']['CF25'] +=1;
                            $data['OT']['CFT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['CM35'] +=1;
                            $data['OT']['CMT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                        else{
                            $data['OT']['CF35'] +=1;
                            $data['OT']['CFT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['CM45'] +=1;
                            $data['OT']['CMT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                        else{
                            $data['OT']['CF45'] +=1;
                            $data['OT']['CFT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['CM55'] +=1;
                            $data['OT']['CMT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                        else{
                            $data['OT']['CF55'] +=1;
                            $data['OT']['CFT'] +=1;
                            $data['OT']['CT'] +=1;
                        }
                    }
                    // end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=13 && $result->age <=17 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['CM13'] +=1;
                            $data['OHI']['CMT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                        else{
                            $data['OHI']['CF13'] +=1;
                            $data['OHI']['CFT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['CM18'] +=1;
                            $data['OHI']['CMT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                        else{
                            $data['OHI']['CF18'] +=1;
                            $data['OHI']['CFT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['CM25'] +=1;
                            $data['OHI']['CMT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                        else{
                            $data['OHI']['CF25'] +=1;
                            $data['OHI']['CFT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['CM35'] +=1;
                            $data['OHI']['CMT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                        else{
                            $data['OHI']['CF35'] +=1;
                            $data['OHI']['CFT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['CM45'] +=1;
                            $data['OHI']['CMT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                        else{
                            $data['OHI']['CF45'] +=1;
                            $data['OHI']['CFT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['CM55'] +=1;
                            $data['OHI']['CMT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                        else{
                            $data['OHI']['CF55'] +=1;
                            $data['OHI']['CFT'] +=1;
                            $data['OHI']['CT'] +=1;
                        }
                    }
                    // end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=13 && $result->age <=17 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['CM13'] +=1;
                            $data['PR']['CMT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                        else{
                            $data['PR']['CF13'] +=1;
                            $data['PR']['CFT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['CM18'] +=1;
                            $data['PR']['CMT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                        else{
                            $data['PR']['CF18'] +=1;
                            $data['PR']['CFT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['CM25'] +=1;
                            $data['PR']['CMT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                        else{
                            $data['PR']['CF25'] +=1;
                            $data['PR']['CFT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['CM35'] +=1;
                            $data['PR']['CMT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                        else{
                            $data['PR']['CF35'] +=1;
                            $data['PR']['CFT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['CM45'] +=1;
                            $data['PR']['CMT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                        else{
                            $data['PR']['CF45'] +=1;
                            $data['PR']['CFT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['CM55'] +=1;
                            $data['PR']['CMT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                        else{
                            $data['PR']['CF55'] +=1;
                            $data['PR']['CFT'] +=1;
                            $data['PR']['CT'] +=1;
                        }
                    }
                    // end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=13 && $result->age <=17 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['CM13'] +=1;
                            $data['IC']['CMT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                        else{
                            $data['IC']['CF13'] +=1;
                            $data['IC']['CFT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['CM18'] +=1;
                            $data['IC']['CMT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                        else{
                            $data['IC']['CF18'] +=1;
                            $data['IC']['CFT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['CM25'] +=1;
                            $data['IC']['CMT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                        else{
                            $data['IC']['CF25'] +=1;
                            $data['IC']['CFT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['CM35'] +=1;
                            $data['IC']['CMT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                        else{
                            $data['IC']['CF35'] +=1;
                            $data['IC']['CFT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['CM45'] +=1;
                            $data['IC']['CMT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                        else{
                            $data['IC']['CF45'] +=1;
                            $data['IC']['CFT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['CM55'] +=1;
                            $data['IC']['CMT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                        else{
                            $data['IC']['CF55'] +=1;
                            $data['IC']['CFT'] +=1;
                            $data['IC']['CT'] +=1;
                        }
                    }
                    // end of Issuance of Med Cert
                }
            }
            if($result->type==1 && $result->services_rendered && $result->employee_student_type == 2){
                foreach(json_decode($result->services_rendered) as $test){
                    // start of oral prophylaxis
                    if($result->age>=13 && $result->age <=17 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['HM13'] +=1;
                            $data['OP']['HMT'] +=1;
                            $data['OP']['HT'] +=1;
                        }
                        else{
                            $data['OP']['HF13'] +=1;
                            $data['OP']['HFT'] +=1;
                            $data['OP']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['HM18'] +=1;
                            $data['OP']['HMT'] +=1;
                            $data['OP']['HT'] +=1;
                        }
                        else{
                            $data['OP']['HF18'] +=1;
                            $data['OP']['HFT'] +=1;
                            $data['OP']['HT'] +=1;
                        }
                    }

                    // end of oral prophylaxis
                    // start of EX
                    if($result->age>=13 && $result->age <=17 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['HM13'] +=1;
                            $data['EX']['HMT'] +=1;
                            $data['EX']['HT'] +=1;
                        }
                        else{
                            $data['EX']['HF13'] +=1;
                            $data['EX']['HFT'] +=1;
                            $data['EX']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['HM18'] +=1;
                            $data['EX']['HMT'] +=1;
                            $data['EX']['HT'] +=1;
                        }
                        else{
                            $data['EX']['HF18'] +=1;
                            $data['EX']['HFT'] +=1;
                            $data['EX']['HT'] +=1;
                        }
                    }
                    // end of EX
                    // start of Permanent Tooth
                    if($result->age>=13 && $result->age <=17 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['HM13'] +=1;
                            $data['PTO']['HMT'] +=1;
                            $data['PTO']['HT'] +=1;
                        }
                        else{
                            $data['PTO']['HF13'] +=1;
                            $data['PTO']['HFT'] +=1;
                            $data['PTO']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['HM18'] +=1;
                            $data['PTO']['HMT'] +=1;
                            $data['PTO']['HT'] +=1;
                        }
                        else{
                            $data['PTO']['HF18'] +=1;
                            $data['PTO']['HFT'] +=1;
                            $data['PTO']['HT'] +=1;
                        }
                    }

                    // end of Permanent Tooth
                    // start of Temporary Tooth
                    if($result->age>=13 && $result->age <=17 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['HM13'] +=1;
                            $data['TTO']['HMT'] +=1;
                            $data['TTO']['HT'] +=1;
                        }
                        else{
                            $data['TTO']['HF13'] +=1;
                            $data['TTO']['HFT'] +=1;
                            $data['TTO']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['HM18'] +=1;
                            $data['TTO']['HMT'] +=1;
                            $data['TTO']['HT'] +=1;
                        }
                        else{
                            $data['TTO']['HF18'] +=1;
                            $data['TTO']['HFT'] +=1;
                            $data['TTO']['HT'] +=1;
                        }
                    }
                    // end of Temporary Tooth
                    // start of Filling/Restoration
                    if($result->age>=13 && $result->age <=17 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['HM13'] +=1;
                            $data['FR']['HMT'] +=1;
                            $data['FR']['HT'] +=1;
                        }
                        else{
                            $data['FR']['HF13'] +=1;
                            $data['FR']['HFT'] +=1;
                            $data['FR']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['HM18'] +=1;
                            $data['FR']['HMT'] +=1;
                            $data['FR']['HT'] +=1;
                        }
                        else{
                            $data['FR']['HF18'] +=1;
                            $data['FR']['HFT'] +=1;
                            $data['FR']['HT'] +=1;
                        }
                    }
                    // end of Filling/Restoration
                    // start of Tooth filled w/ Comp
                    if($result->age>=13 && $result->age <=17 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['HM13'] +=1;
                            $data['TFC']['HMT'] +=1;
                            $data['TFC']['HT'] +=1;
                        }
                        else{
                            $data['TFC']['HF13'] +=1;
                            $data['TFC']['HFT'] +=1;
                            $data['TFC']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['HM18'] +=1;
                            $data['TFC']['HMT'] +=1;
                            $data['TFC']['HT'] +=1;
                        }
                        else{
                            $data['TFC']['HF18'] +=1;
                            $data['TFC']['HFT'] +=1;
                            $data['TFC']['HT'] +=1;
                        }
                    }
                    // end of Tooth filled w/ Comp
                    // start of Tooth filled w/ GIC
                    if($result->age>=13 && $result->age <=17 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['HM13'] +=1;
                            $data['TFG']['HMT'] +=1;
                            $data['TFG']['HT'] +=1;
                        }
                        else{
                            $data['TFG']['HF13'] +=1;
                            $data['TFG']['HFT'] +=1;
                            $data['TFG']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['HM18'] +=1;
                            $data['TFG']['HMT'] +=1;
                            $data['TFG']['HT'] +=1;
                        }
                        else{
                            $data['TFG']['HF18'] +=1;
                            $data['TFG']['HFT'] +=1;
                            $data['TFG']['HT'] +=1;
                        }
                    }
                    // end of Tooth filled w/ GIC
                    // start of SE
                    if($result->age>=13 && $result->age <=17 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['HM13'] +=1;
                            $data['SE']['HMT'] +=1;
                            $data['SE']['HT'] +=1;
                        }
                        else{
                            $data['SE']['HF13'] +=1;
                            $data['SE']['HFT'] +=1;
                            $data['SE']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['HM18'] +=1;
                            $data['SE']['HMT'] +=1;
                            $data['SE']['HT'] +=1;
                        }
                        else{
                            $data['SE']['HF18'] +=1;
                            $data['SE']['HFT'] +=1;
                            $data['SE']['HT'] +=1;
                        }
                    }
                    // end of SE
                    // start of Tooth Applied w/ SE
                    if($result->age>=13 && $result->age <=17 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['HM13'] +=1;
                            $data['TAS']['HMT'] +=1;
                            $data['TAS']['HT'] +=1;
                        }
                        else{
                            $data['TAS']['HF13'] +=1;
                            $data['TAS']['HFT'] +=1;
                            $data['TAS']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['HM18'] +=1;
                            $data['TAS']['HMT'] +=1;
                            $data['TAS']['HT'] +=1;
                        }
                        else{
                            $data['TAS']['HF18'] +=1;
                            $data['TAS']['HFT'] +=1;
                            $data['TAS']['HT'] +=1;
                        }
                    }

                    // end of Tooth Applied w/ SE
                    // start of Other Treatment
                    if($result->age>=13 && $result->age <=17 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['HM13'] +=1;
                            $data['OT']['HMT'] +=1;
                            $data['OT']['HT'] +=1;
                        }
                        else{
                            $data['OT']['HF13'] +=1;
                            $data['OT']['HFT'] +=1;
                            $data['OT']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['HM18'] +=1;
                            $data['OT']['HMT'] +=1;
                            $data['OT']['HT'] +=1;
                        }
                        else{
                            $data['OT']['HF18'] +=1;
                            $data['OT']['HFT'] +=1;
                            $data['OT']['HT'] +=1;
                        }
                    }
                    // end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=13 && $result->age <=17 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['HM13'] +=1;
                            $data['OHI']['HMT'] +=1;
                            $data['OHI']['HT'] +=1;
                        }
                        else{
                            $data['OHI']['HF13'] +=1;
                            $data['OHI']['HFT'] +=1;
                            $data['OHI']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['HM18'] +=1;
                            $data['OHI']['HMT'] +=1;
                            $data['OHI']['HT'] +=1;
                        }
                        else{
                            $data['OHI']['HF18'] +=1;
                            $data['OHI']['HFT'] +=1;
                            $data['OHI']['HT'] +=1;
                        }
                    }
                    // end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=13 && $result->age <=17 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['HM13'] +=1;
                            $data['PR']['HMT'] +=1;
                            $data['PR']['HT'] +=1;
                        }
                        else{
                            $data['PR']['HF13'] +=1;
                            $data['PR']['HFT'] +=1;
                            $data['PR']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['HM18'] +=1;
                            $data['PR']['HMT'] +=1;
                            $data['PR']['HT'] +=1;
                        }
                        else{
                            $data['PR']['HF18'] +=1;
                            $data['PR']['HFT'] +=1;
                            $data['PR']['HT'] +=1;
                        }
                    }
                    // end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=13 && $result->age <=17 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['HM13'] +=1;
                            $data['IC']['HMT'] +=1;
                            $data['IC']['HT'] +=1;
                        }
                        else{
                            $data['IC']['HF13'] +=1;
                            $data['IC']['HFT'] +=1;
                            $data['IC']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['HM18'] +=1;
                            $data['IC']['HMT'] +=1;
                            $data['IC']['HT'] +=1;
                        }
                        else{
                            $data['IC']['HF18'] +=1;
                            $data['IC']['HFT'] +=1;
                            $data['IC']['HT'] +=1;
                        }
                    }
                    // end of Issuance of Med Cert
                }
            }
            if($result->type==1 && $result->services_rendered && $result->employee_student_type == 3){
                foreach(json_decode($result->services_rendered) as $test){
                    // start of oral prophylaxis
                    if($result->age>=5 && $result->age <=12 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['EM5'] +=1;
                            $data['OP']['EMT'] +=1;
                            $data['OP']['ET'] +=1;
                        }
                        else{
                            $data['OP']['EF5'] +=1;
                            $data['OP']['EFT'] +=1;
                            $data['OP']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['EM13'] +=1;
                            $data['OP']['EMT'] +=1;
                            $data['OP']['ET'] +=1;
                        }
                        else{
                            $data['OP']['EF13'] +=1;
                            $data['OP']['EFT'] +=1;
                            $data['OP']['ET'] +=1;
                        }
                    }

                    // end of oral prophylaxis
                    // start of EX
                    if($result->age>=5 && $result->age <=12 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['EM5'] +=1;
                            $data['EX']['EMT'] +=1;
                            $data['EX']['ET'] +=1;
                        }
                        else{
                            $data['EX']['EF5'] +=1;
                            $data['EX']['EFT'] +=1;
                            $data['EX']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['EM13'] +=1;
                            $data['EX']['EMT'] +=1;
                            $data['EX']['ET'] +=1;
                        }
                        else{
                            $data['EX']['EF13'] +=1;
                            $data['EX']['EFT'] +=1;
                            $data['EX']['ET'] +=1;
                        }
                    }
                    // end of EX
                    // start of Permanent Tooth
                    if($result->age>=5 && $result->age <=12 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['EM5'] +=1;
                            $data['PTO']['EMT'] +=1;
                            $data['PTO']['ET'] +=1;
                        }
                        else{
                            $data['PTO']['EF5'] +=1;
                            $data['PTO']['EFT'] +=1;
                            $data['PTO']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['EM13'] +=1;
                            $data['PTO']['EMT'] +=1;
                            $data['PTO']['ET'] +=1;
                        }
                        else{
                            $data['PTO']['EF13'] +=1;
                            $data['PTO']['EFT'] +=1;
                            $data['PTO']['ET'] +=1;
                        }
                    }

                    // end of Permanent Tooth
                    // start of Temporary Tooth
                    if($result->age>=5 && $result->age <=12 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['EM5'] +=1;
                            $data['TTO']['EMT'] +=1;
                            $data['TTO']['ET'] +=1;
                        }
                        else{
                            $data['TTO']['EF5'] +=1;
                            $data['TTO']['EFT'] +=1;
                            $data['TTO']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['EM13'] +=1;
                            $data['TTO']['EMT'] +=1;
                            $data['TTO']['ET'] +=1;
                        }
                        else{
                            $data['TTO']['EF13'] +=1;
                            $data['TTO']['EFT'] +=1;
                            $data['TTO']['ET'] +=1;
                        }
                    }
                    // end of Temporary Tooth
                    // start of Filling/Restoration
                    if($result->age>=5 && $result->age <=12 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['EM5'] +=1;
                            $data['FR']['EMT'] +=1;
                            $data['FR']['ET'] +=1;
                        }
                        else{
                            $data['FR']['EF5'] +=1;
                            $data['FR']['EFT'] +=1;
                            $data['FR']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['EM13'] +=1;
                            $data['FR']['EMT'] +=1;
                            $data['FR']['ET'] +=1;
                        }
                        else{
                            $data['FR']['EF13'] +=1;
                            $data['FR']['EFT'] +=1;
                            $data['FR']['ET'] +=1;
                        }
                    }
                    // end of Filling/Restoration
                    // start of Tooth filled w/ Comp
                    if($result->age>=5 && $result->age <=12 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['EM5'] +=1;
                            $data['TFC']['EMT'] +=1;
                            $data['TFC']['ET'] +=1;
                        }
                        else{
                            $data['TFC']['EF5'] +=1;
                            $data['TFC']['EFT'] +=1;
                            $data['TFC']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['EM13'] +=1;
                            $data['TFC']['EMT'] +=1;
                            $data['TFC']['ET'] +=1;
                        }
                        else{
                            $data['TFC']['EF13'] +=1;
                            $data['TFC']['EFT'] +=1;
                            $data['TFC']['ET'] +=1;
                        }
                    }
                    // end of Tooth filled w/ Comp
                    // start of Tooth filled w/ GIC
                    if($result->age>=5 && $result->age <=12 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['EM5'] +=1;
                            $data['TFG']['EMT'] +=1;
                            $data['TFG']['ET'] +=1;
                        }
                        else{
                            $data['TFG']['EF5'] +=1;
                            $data['TFG']['EFT'] +=1;
                            $data['TFG']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['EM13'] +=1;
                            $data['TFG']['EMT'] +=1;
                            $data['TFG']['ET'] +=1;
                        }
                        else{
                            $data['TFG']['EF13'] +=1;
                            $data['TFG']['EFT'] +=1;
                            $data['TFG']['ET'] +=1;
                        }
                    }
                    // end of Tooth filled w/ GIC
                    // start of SE
                    if($result->age>=5 && $result->age <=12 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['EM5'] +=1;
                            $data['SE']['EMT'] +=1;
                            $data['SE']['ET'] +=1;
                        }
                        else{
                            $data['SE']['EF5'] +=1;
                            $data['SE']['EFT'] +=1;
                            $data['SE']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['EM13'] +=1;
                            $data['SE']['EMT'] +=1;
                            $data['SE']['ET'] +=1;
                        }
                        else{
                            $data['SE']['EF13'] +=1;
                            $data['SE']['EFT'] +=1;
                            $data['SE']['ET'] +=1;
                        }
                    }
                    // end of SE
                    // start of Tooth Applied w/ SE
                    if($result->age>=5 && $result->age <=12 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['EM5'] +=1;
                            $data['TAS']['EMT'] +=1;
                            $data['TAS']['ET'] +=1;
                        }
                        else{
                            $data['TAS']['EF5'] +=1;
                            $data['TAS']['EFT'] +=1;
                            $data['TAS']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['EM13'] +=1;
                            $data['TAS']['EMT'] +=1;
                            $data['TAS']['ET'] +=1;
                        }
                        else{
                            $data['TAS']['EF13'] +=1;
                            $data['TAS']['EFT'] +=1;
                            $data['TAS']['ET'] +=1;
                        }
                    }

                    // end of Tooth Applied w/ SE
                    // start of Other Treatment
                    if($result->age>=5 && $result->age <=12 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['EM5'] +=1;
                            $data['OT']['EMT'] +=1;
                            $data['OT']['ET'] +=1;
                        }
                        else{
                            $data['OT']['EF5'] +=1;
                            $data['OT']['EFT'] +=1;
                            $data['OT']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['EM13'] +=1;
                            $data['OT']['EMT'] +=1;
                            $data['OT']['ET'] +=1;
                        }
                        else{
                            $data['OT']['EF13'] +=1;
                            $data['OT']['EFT'] +=1;
                            $data['OT']['ET'] +=1;
                        }
                    }
                    // end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=5 && $result->age <=12 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['EM5'] +=1;
                            $data['OHI']['EMT'] +=1;
                            $data['OHI']['ET'] +=1;
                        }
                        else{
                            $data['OHI']['EF5'] +=1;
                            $data['OHI']['EFT'] +=1;
                            $data['OHI']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['EM13'] +=1;
                            $data['OHI']['EMT'] +=1;
                            $data['OHI']['ET'] +=1;
                        }
                        else{
                            $data['OHI']['EF13'] +=1;
                            $data['OHI']['EFT'] +=1;
                            $data['OHI']['ET'] +=1;
                        }
                    }
                    // end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=5 && $result->age <=12 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['EM5'] +=1;
                            $data['PR']['EMT'] +=1;
                            $data['PR']['ET'] +=1;
                        }
                        else{
                            $data['PR']['EF5'] +=1;
                            $data['PR']['EFT'] +=1;
                            $data['PR']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['EM13'] +=1;
                            $data['PR']['EMT'] +=1;
                            $data['PR']['ET'] +=1;
                        }
                        else{
                            $data['PR']['EF13'] +=1;
                            $data['PR']['EFT'] +=1;
                            $data['PR']['ET'] +=1;
                        }
                    }
                    // end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=5 && $result->age <=12 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['EM5'] +=1;
                            $data['IC']['EMT'] +=1;
                            $data['IC']['ET'] +=1;
                        }
                        else{
                            $data['IC']['EF5'] +=1;
                            $data['IC']['EFT'] +=1;
                            $data['IC']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['EM13'] +=1;
                            $data['IC']['EMT'] +=1;
                            $data['IC']['ET'] +=1;
                        }
                        else{
                            $data['IC']['EF13'] +=1;
                            $data['IC']['EFT'] +=1;
                            $data['IC']['ET'] +=1;
                        }
                    }
                    // end of Issuance of Med Cert
                }
            }
            // if($result->type==2 && $result->services_rendered){
            //     foreach(json_decode($result->services_rendered) as $test){
            //         // start of oral prophylaxis
            //         if($result->age>=18 && $result->age <=24 && $test->id==3){
            //             if($result->sex == 'Male'){
            //                 $data['OP']['SM18'] +=1;
            //                 $data['OP']['SMT'] +=1;
            //                 $data['OP']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OP']['SF18'] +=1;
            //                 $data['OP']['SFT'] +=1;
            //                 $data['OP']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==3){
            //             if($result->sex == 'Male'){
            //                 $data['OP']['SM25'] +=1;
            //                 $data['OP']['SMT'] +=1;
            //                 $data['OP']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OP']['SF25'] +=1;
            //                 $data['OP']['SFT'] +=1;
            //                 $data['OP']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==3){
            //             if($result->sex == 'Male'){
            //                 $data['OP']['SM35'] +=1;
            //                 $data['OP']['SMT'] +=1;
            //                 $data['OP']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OP']['SF35'] +=1;
            //                 $data['OP']['SFT'] +=1;
            //                 $data['OP']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==3){
            //             if($result->sex == 'Male'){
            //                 $data['OP']['SM45'] +=1;
            //                 $data['OP']['SMT'] +=1;
            //                 $data['OP']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OP']['SF45'] +=1;
            //                 $data['OP']['SFT'] +=1;
            //                 $data['OP']['ST'] +=1;
            //             }
            //         }
            //         ///end of oral prophylaxis
            //         // start of EX
            //         if($result->age>=18 && $result->age <=24 && $test->id==4){
            //             if($result->sex == 'Male'){
            //                 $data['EX']['SM18'] +=1;
            //                 $data['EX']['SMT'] +=1;
            //                 $data['EX']['ST'] +=1;
            //             }
            //             else{
            //                 $data['EX']['SF18'] +=1;
            //                 $data['EX']['SFT'] +=1;
            //                 $data['EX']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==4){
            //             if($result->sex == 'Male'){
            //                 $data['EX']['SM25'] +=1;
            //                 $data['EX']['SMT'] +=1;
            //                 $data['EX']['ST'] +=1;
            //             }
            //             else{
            //                 $data['EX']['SF25'] +=1;
            //                 $data['EX']['SFT'] +=1;
            //                 $data['EX']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==4){
            //             if($result->sex == 'Male'){
            //                 $data['EX']['SM35'] +=1;
            //                 $data['EX']['SMT'] +=1;
            //                 $data['EX']['ST'] +=1;
            //             }
            //             else{
            //                 $data['EX']['SF35'] +=1;
            //                 $data['EX']['SFT'] +=1;
            //                 $data['EX']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==4){
            //             if($result->sex == 'Male'){
            //                 $data['EX']['SM45'] +=1;
            //                 $data['EX']['SMT'] +=1;
            //                 $data['EX']['ST'] +=1;
            //             }
            //             else{
            //                 $data['EX']['SF45'] +=1;
            //                 $data['EX']['SFT'] +=1;
            //                 $data['EX']['ST'] +=1;
            //             }
            //         }
            //         ///end of EX
            //         // start of permanent tooth
            //         if($result->age>=18 && $result->age <=24 && $test->id==5){
            //             if($result->sex == 'Male'){
            //                 $data['PTO']['SM18'] +=1;
            //                 $data['PTO']['SMT'] +=1;
            //                 $data['PTO']['ST'] +=1;
            //             }
            //             else{
            //                 $data['PTO']['SF18'] +=1;
            //                 $data['PTO']['SFT'] +=1;
            //                 $data['PTO']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==5){
            //             if($result->sex == 'Male'){
            //                 $data['PTO']['SM25'] +=1;
            //                 $data['PTO']['SMT'] +=1;
            //                 $data['PTO']['ST'] +=1;
            //             }
            //             else{
            //                 $data['PTO']['SF25'] +=1;
            //                 $data['PTO']['SFT'] +=1;
            //                 $data['PTO']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==5){
            //             if($result->sex == 'Male'){
            //                 $data['PTO']['SM35'] +=1;
            //                 $data['PTO']['SMT'] +=1;
            //                 $data['PTO']['ST'] +=1;
            //             }
            //             else{
            //                 $data['PTO']['SF35'] +=1;
            //                 $data['PTO']['SFT'] +=1;
            //                 $data['PTO']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==5){
            //             if($result->sex == 'Male'){
            //                 $data['PTO']['SM45'] +=1;
            //                 $data['PTO']['SMT'] +=1;
            //                 $data['PTO']['ST'] +=1;
            //             }
            //             else{
            //                 $data['PTO']['SF45'] +=1;
            //                 $data['PTO']['SFT'] +=1;
            //                 $data['PTO']['ST'] +=1;
            //             }
            //         }
            //         ///end of permanent tooth
            //         // start of temporary tooth
            //         if($result->age>=18 && $result->age <=24 && $test->id==6){
            //             if($result->sex == 'Male'){
            //                 $data['TTO']['SM18'] +=1;
            //                 $data['TTO']['SMT'] +=1;
            //                 $data['TTO']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TTO']['SF18'] +=1;
            //                 $data['TTO']['SFT'] +=1;
            //                 $data['TTO']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==6){
            //             if($result->sex == 'Male'){
            //                 $data['TTO']['SM25'] +=1;
            //                 $data['TTO']['SMT'] +=1;
            //                 $data['TTO']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TTO']['SF25'] +=1;
            //                 $data['TTO']['SFT'] +=1;
            //                 $data['TTO']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==6){
            //             if($result->sex == 'Male'){
            //                 $data['TTO']['SM35'] +=1;
            //                 $data['TTO']['SMT'] +=1;
            //                 $data['TTO']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TTO']['SF35'] +=1;
            //                 $data['TTO']['SFT'] +=1;
            //                 $data['TTO']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==6){
            //             if($result->sex == 'Male'){
            //                 $data['TTO']['SM45'] +=1;
            //                 $data['TTO']['SMT'] +=1;
            //                 $data['TTO']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TTO']['SF45'] +=1;
            //                 $data['TTO']['SFT'] +=1;
            //                 $data['TTO']['ST'] +=1;
            //             }
            //         }
            //         ///end of temporary tooth
            //         // start of filling/restoration
            //         if($result->age>=18 && $result->age <=24 && $test->id==7){
            //             if($result->sex == 'Male'){
            //                 $data['FR']['SM18'] +=1;
            //                 $data['FR']['SMT'] +=1;
            //                 $data['FR']['ST'] +=1;
            //             }
            //             else{
            //                 $data['FR']['SF18'] +=1;
            //                 $data['FR']['SFT'] +=1;
            //                 $data['FR']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==7){
            //             if($result->sex == 'Male'){
            //                 $data['FR']['SM25'] +=1;
            //                 $data['FR']['SMT'] +=1;
            //                 $data['FR']['ST'] +=1;
            //             }
            //             else{
            //                 $data['FR']['SF25'] +=1;
            //                 $data['FR']['SFT'] +=1;
            //                 $data['FR']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==7){
            //             if($result->sex == 'Male'){
            //                 $data['FR']['SM35'] +=1;
            //                 $data['FR']['SMT'] +=1;
            //                 $data['FR']['ST'] +=1;
            //             }
            //             else{
            //                 $data['FR']['SF35'] +=1;
            //                 $data['FR']['SFT'] +=1;
            //                 $data['FR']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==7){
            //             if($result->sex == 'Male'){
            //                 $data['FR']['SM45'] +=1;
            //                 $data['FR']['SMT'] +=1;
            //                 $data['FR']['ST'] +=1;
            //             }
            //             else{
            //                 $data['FR']['SF45'] +=1;
            //                 $data['FR']['SFT'] +=1;
            //                 $data['FR']['ST'] +=1;
            //             }
            //         }
            //         ///end of filling/restoration
            //         // start of teeth filled with comp
            //         if($result->age>=18 && $result->age <=24 && $test->id==8){
            //             if($result->sex == 'Male'){
            //                 $data['TFC']['SM18'] +=1;
            //                 $data['TFC']['SMT'] +=1;
            //                 $data['TFC']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TFC']['SF18'] +=1;
            //                 $data['TFC']['SFT'] +=1;
            //                 $data['TFC']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==8){
            //             if($result->sex == 'Male'){
            //                 $data['TFC']['SM25'] +=1;
            //                 $data['TFC']['SMT'] +=1;
            //                 $data['TFC']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TFC']['SF25'] +=1;
            //                 $data['TFC']['SFT'] +=1;
            //                 $data['TFC']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==8){
            //             if($result->sex == 'Male'){
            //                 $data['TFC']['SM35'] +=1;
            //                 $data['TFC']['SMT'] +=1;
            //                 $data['TFC']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TFC']['SF35'] +=1;
            //                 $data['TFC']['SFT'] +=1;
            //                 $data['TFC']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==8){
            //             if($result->sex == 'Male'){
            //                 $data['TFC']['SM45'] +=1;
            //                 $data['TFC']['SMT'] +=1;
            //                 $data['TFC']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TFC']['SF45'] +=1;
            //                 $data['TFC']['SFT'] +=1;
            //                 $data['TFC']['ST'] +=1;
            //             }
            //         }
            //         ///end of teeth filled with comp
            //         // start of teeth filled with gic
            //         if($result->age>=18 && $result->age <=24 && $test->id==9){
            //             if($result->sex == 'Male'){
            //                 $data['TFG']['SM18'] +=1;
            //                 $data['TFG']['SMT'] +=1;
            //                 $data['TFG']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TFG']['SF18'] +=1;
            //                 $data['TFG']['SFT'] +=1;
            //                 $data['TFG']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==9){
            //             if($result->sex == 'Male'){
            //                 $data['TFG']['SM25'] +=1;
            //                 $data['TFG']['SMT'] +=1;
            //                 $data['TFG']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TFG']['SF25'] +=1;
            //                 $data['TFG']['SFT'] +=1;
            //                 $data['TFG']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==9){
            //             if($result->sex == 'Male'){
            //                 $data['TFG']['SM35'] +=1;
            //                 $data['TFG']['SMT'] +=1;
            //                 $data['TFG']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TFG']['SF35'] +=1;
            //                 $data['TFG']['SFT'] +=1;
            //                 $data['TFG']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==9){
            //             if($result->sex == 'Male'){
            //                 $data['TFG']['SM45'] +=1;
            //                 $data['TFG']['SMT'] +=1;
            //                 $data['TFG']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TFG']['SF45'] +=1;
            //                 $data['TFG']['SFT'] +=1;
            //             }
            //         }
            //         ///end of teeth filled with gic
            //         // start of SE
            //         if($result->age>=18 && $result->age <=24 && $test->id==10){
            //             if($result->sex == 'Male'){
            //                 $data['SE']['SM18'] +=1;
            //                 $data['SE']['SMT'] +=1;
            //                 $data['SE']['ST'] +=1;
            //             }
            //             else{
            //                 $data['SE']['SF18'] +=1;
            //                 $data['SE']['SFT'] +=1;
            //                 $data['SE']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==10){
            //             if($result->sex == 'Male'){
            //                 $data['SE']['SM25'] +=1;
            //                 $data['SE']['SMT'] +=1;
            //                 $data['SE']['ST'] +=1;
            //             }
            //             else{
            //                 $data['SE']['SF25'] +=1;
            //                 $data['SE']['SFT'] +=1;
            //                 $data['SE']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==10){
            //             if($result->sex == 'Male'){
            //                 $data['SE']['SM35'] +=1;
            //                 $data['SE']['SMT'] +=1;
            //                 $data['SE']['ST'] +=1;
            //             }
            //             else{
            //                 $data['SE']['SF35'] +=1;
            //                 $data['SE']['SFT'] +=1;
            //                 $data['SE']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==10){
            //             if($result->sex == 'Male'){
            //                 $data['SE']['SM45'] +=1;
            //                 $data['SE']['SMT'] +=1;
            //                 $data['SE']['ST'] +=1;
            //             }
            //             else{
            //                 $data['SE']['SF45'] +=1;
            //                 $data['SE']['SFT'] +=1;
            //                 $data['SE']['ST'] +=1;
            //             }
            //         }
            //         ///end of SE
            //         // start of Tooth Applied w/ SE
            //         if($result->age>=18 && $result->age <=24 && $test->id==11){
            //             if($result->sex == 'Male'){
            //                 $data['TAS']['SM18'] +=1;
            //                 $data['TAS']['SMT'] +=1;
            //                 $data['TAS']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TAS']['SF18'] +=1;
            //                 $data['TAS']['SFT'] +=1;
            //                 $data['TAS']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==11){
            //             if($result->sex == 'Male'){
            //                 $data['TAS']['SM25'] +=1;
            //                 $data['TAS']['SMT'] +=1;
            //                 $data['TAS']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TAS']['SF25'] +=1;
            //                 $data['TAS']['SFT'] +=1;
            //                 $data['TAS']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==11){
            //             if($result->sex == 'Male'){
            //                 $data['TAS']['SM35'] +=1;
            //                 $data['TAS']['SMT'] +=1;
            //                 $data['TAS']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TAS']['SF35'] +=1;
            //                 $data['TAS']['SFT'] +=1;
            //                 $data['TAS']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==11){
            //             if($result->sex == 'Male'){
            //                 $data['TAS']['SM45'] +=1;
            //                 $data['TAS']['SMT'] +=1;
            //                 $data['TAS']['ST'] +=1;
            //             }
            //             else{
            //                 $data['TAS']['SF45'] +=1;
            //                 $data['TAS']['SFT'] +=1;
            //                 $data['TAS']['ST'] +=1;
            //             }
            //         }
            //         ///end of Tooth Applied w/ SE
            //         // start of Other Treatment
            //         if($result->age>=18 && $result->age <=24 && $test->id==12){
            //             if($result->sex == 'Male'){
            //                 $data['OT']['SM18'] +=1;
            //                 $data['OT']['SMT'] +=1;
            //                 $data['OT']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OT']['SF18'] +=1;
            //                 $data['OT']['SFT'] +=1;
            //                 $data['OT']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==12){
            //             if($result->sex == 'Male'){
            //                 $data['OT']['SM25'] +=1;
            //                 $data['OT']['SMT'] +=1;
            //                 $data['OT']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OT']['SF25'] +=1;
            //                 $data['OT']['SFT'] +=1;
            //                 $data['OT']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==12){
            //             if($result->sex == 'Male'){
            //                 $data['OT']['SM35'] +=1;
            //                 $data['OT']['SMT'] +=1;
            //                 $data['OT']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OT']['SF35'] +=1;
            //                 $data['OT']['SFT'] +=1;
            //                 $data['OT']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==12){
            //             if($result->sex == 'Male'){
            //                 $data['OT']['SM45'] +=1;
            //                 $data['OT']['SMT'] +=1;
            //                 $data['OT']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OT']['SF45'] +=1;
            //                 $data['OT']['SFT'] +=1;
            //                 $data['OT']['ST'] +=1;
            //             }
            //         }
            //         ///end of Other Treatment
            //         // start of Oral Health Instruction
            //         if($result->age>=18 && $result->age <=24 && $test->id==13){
            //             if($result->sex == 'Male'){
            //                 $data['OHI']['SM18'] +=1;
            //                 $data['OHI']['SMT'] +=1;
            //                 $data['OHI']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OHI']['SF18'] +=1;
            //                 $data['OHI']['SFT'] +=1;
            //                 $data['OHI']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==13){
            //             if($result->sex == 'Male'){
            //                 $data['OHI']['SM25'] +=1;
            //                 $data['OHI']['SMT'] +=1;
            //                 $data['OHI']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OHI']['SF25'] +=1;
            //                 $data['OHI']['SFT'] +=1;
            //                 $data['OHI']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==13){
            //             if($result->sex == 'Male'){
            //                 $data['OHI']['SM35'] +=1;
            //                 $data['OHI']['SMT'] +=1;
            //                 $data['OHI']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OHI']['SF35'] +=1;
            //                 $data['OHI']['SFT'] +=1;
            //                 $data['OHI']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==13){
            //             if($result->sex == 'Male'){
            //                 $data['OHI']['SM45'] +=1;
            //                 $data['OHI']['SMT'] +=1;
            //                 $data['OHI']['ST'] +=1;
            //             }
            //             else{
            //                 $data['OHI']['SF45'] +=1;
            //                 $data['OHI']['SFT'] +=1;
            //                 $data['OHI']['ST'] +=1;
            //             }
            //         }
            //         ///end of Oral Health Instruction
            //         // start of Referral
            //         if($result->age>=18 && $result->age <=24 && $test->id==14){
            //             if($result->sex == 'Male'){
            //                 $data['PR']['SM18'] +=1;
            //                 $data['PR']['SMT'] +=1;
            //                 $data['PR']['ST'] +=1;
            //             }
            //             else{
            //                 $data['PR']['SF18'] +=1;
            //                 $data['PR']['SFT'] +=1;
            //                 $data['PR']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==14){
            //             if($result->sex == 'Male'){
            //                 $data['PR']['SM25'] +=1;
            //                 $data['PR']['SMT'] +=1;
            //                 $data['PR']['ST'] +=1;
            //             }
            //             else{
            //                 $data['PR']['SF25'] +=1;
            //                 $data['PR']['SFT'] +=1;
            //                 $data['PR']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==14){
            //             if($result->sex == 'Male'){
            //                 $data['PR']['SM35'] +=1;
            //                 $data['PR']['SMT'] +=1;
            //                 $data['PR']['ST'] +=1;
            //             }
            //             else{
            //                 $data['PR']['SF35'] +=1;
            //                 $data['PR']['SFT'] +=1;
            //                 $data['PR']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==14){
            //             if($result->sex == 'Male'){
            //                 $data['PR']['SM45'] +=1;
            //                 $data['PR']['SMT'] +=1;
            //                 $data['PR']['ST'] +=1;
            //             }
            //             else{
            //                 $data['PR']['SF45'] +=1;
            //                 $data['PR']['SFT'] +=1;
            //                 $data['PR']['ST'] +=1;
            //             }
            //         }
            //         ///end of Referral
            //         // start of Issuance of Med Cert
            //         if($result->age>=18 && $result->age <=24 && $test->id==15){
            //             if($result->sex == 'Male'){
            //                 $data['IC']['SM18'] +=1;
            //                 $data['IC']['SMT'] +=1;
            //                 $data['IC']['ST'] +=1;
            //             }
            //             else{
            //                 $data['IC']['SF18'] +=1;
            //                 $data['IC']['SFT'] +=1;
            //                 $data['IC']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=25 && $result->age <=34 && $test->id==15){
            //             if($result->sex == 'Male'){
            //                 $data['IC']['SM25'] +=1;
            //                 $data['IC']['SMT'] +=1;
            //                 $data['IC']['ST'] +=1;
            //             }
            //             else{
            //                 $data['IC']['SF25'] +=1;
            //                 $data['IC']['SFT'] +=1;
            //                 $data['IC']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=35 && $result->age <=44 && $test->id==15){
            //             if($result->sex == 'Male'){
            //                 $data['IC']['SM35'] +=1;
            //                 $data['IC']['SMT'] +=1;
            //                 $data['IC']['ST'] +=1;
            //             }
            //             else{
            //                 $data['IC']['SF35'] +=1;
            //                 $data['IC']['SFT'] +=1;
            //                 $data['IC']['ST'] +=1;
            //             }
            //         }
            //         if($result->age>=45 && $result->age <=54 && $test->id==15){
            //             if($result->sex == 'Male'){
            //                 $data['IC']['SM45'] +=1;
            //                 $data['IC']['SMT'] +=1;
            //                 $data['IC']['ST'] +=1;
            //             }
            //             else{
            //                 $data['IC']['SF45'] +=1;
            //                 $data['IC']['SFT'] +=1;
            //                 $data['IC']['ST'] +=1;
            //             }
            //         }
            //         ///end of Issuance of Med Cert
            //     }
            // }
            if($result->type==3 && $result->services_rendered){
                foreach(json_decode($result->services_rendered) as $test){
                    // start of oral prophylaxis
                    if($result->age>=0 && $result->age <=4 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM0'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF0'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM5'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF5'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM13'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF13'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM18'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF18'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM25'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF25'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM35'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF35'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM45'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF45'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM55'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF55'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['OP']['DM66'] +=1;
                            $data['OP']['DMT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                        else{
                            $data['OP']['DF66'] +=1;
                            $data['OP']['DFT'] +=1;
                            $data['OP']['DT'] +=1;
                        }
                    }
                    ///end of oral prophylaxis
                    // start of EX
                    if($result->age>=0 && $result->age <=4 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM0'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF0'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM5'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF5'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM13'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF13'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM18'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF18'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM25'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF25'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM35'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF35'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM45'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF45'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM55'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF55'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['EX']['DM66'] +=1;
                            $data['EX']['DMT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                        else{
                            $data['EX']['DF66'] +=1;
                            $data['EX']['DFT'] +=1;
                            $data['EX']['DT'] +=1;
                        }
                    }

                    ///end of EX
                    // start of permanent tooth
                    if($result->age>=0 && $result->age <=4 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM0'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF0'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM5'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF5'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM13'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF13'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM18'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF18'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM25'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF25'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM35'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF35'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM45'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF45'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM55'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF55'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['PTO']['DM66'] +=1;
                            $data['PTO']['DMT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                        else{
                            $data['PTO']['DF66'] +=1;
                            $data['PTO']['DFT'] +=1;
                            $data['PTO']['DT'] +=1;
                        }
                    }
                    ///end of permanent tooth
                    // start of temporary tooth
                    if($result->age>=0 && $result->age <=4 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM0'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF0'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM5'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF5'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM13'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF13'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM18'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF18'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM25'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF25'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM35'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF35'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM45'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF45'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM55'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF55'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }
                    if($result->age>=66  && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['TTO']['DM66'] +=1;
                            $data['TTO']['DMT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                        else{
                            $data['TTO']['DF66'] +=1;
                            $data['TTO']['DFT'] +=1;
                            $data['TTO']['DT'] +=1;
                        }
                    }

                    ///end of temporary tooth
                    // start of filling/restoration
                    if($result->age>=0 && $result->age <=4 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM0'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF0'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM5'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF5'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM13'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF13'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM18'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF18'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM25'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF25'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM35'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF35'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM45'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF45'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM55'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF55'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }
                    if($result->age>=66  && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['FR']['DM66'] +=1;
                            $data['FR']['DMT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                        else{
                            $data['FR']['DF66'] +=1;
                            $data['FR']['DFT'] +=1;
                            $data['FR']['DT'] +=1;
                        }
                    }

                    ///end of filling/restoration
                    // start of teeth filled with comp
                    if($result->age>=0 && $result->age <=4 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM0'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF0'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM5'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF5'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM13'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF13'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM18'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF18'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM25'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF25'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM35'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF35'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM45'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF45'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM55'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF55'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['TFC']['DM66'] +=1;
                            $data['TFC']['DMT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                        else{
                            $data['TFC']['DF66'] +=1;
                            $data['TFC']['DFT'] +=1;
                            $data['TFC']['DT'] +=1;
                        }
                    }

                    ///end of teeth filled with comp
                    // start of teeth filled with gic
                    if($result->age>=0 && $result->age <=4 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM0'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF0'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM5'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF5'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM13'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF13'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM18'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF18'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM25'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF25'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM35'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF35'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM45'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF45'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM55'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF55'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['TFG']['DM66'] +=1;
                            $data['TFG']['DMT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                        else{
                            $data['TFG']['DF66'] +=1;
                            $data['TFG']['DFT'] +=1;
                            $data['TFG']['DT'] +=1;
                        }
                    }
                    ///end of teeth filled with gic
                    // start of SE
                    if($result->age>=0 && $result->age <=4 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM0'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF0'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM5'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF5'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM13'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF13'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM18'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF18'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM25'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF25'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM35'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF35'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM45'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF45'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM55'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF55'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['SE']['DM66'] +=1;
                            $data['SE']['DMT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                        else{
                            $data['SE']['DF66'] +=1;
                            $data['SE']['DFT'] +=1;
                            $data['SE']['DT'] +=1;
                        }
                    }
                    ///end of SE
                    // start of Tooth Applied w/ SE
                    if($result->age>=0 && $result->age <=4 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM0'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF0'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM5'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF5'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM13'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF13'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM18'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF18'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM25'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF25'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM35'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF35'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM45'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF45'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM55'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF55'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['TAS']['DM66'] +=1;
                            $data['TAS']['DMT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                        else{
                            $data['TAS']['DF66'] +=1;
                            $data['TAS']['DFT'] +=1;
                            $data['TAS']['DT'] +=1;
                        }
                    }
                    ///end of Tooth Applied w/ SE
                    // start of Other Treatment
                    if($result->age>=0 && $result->age <=4 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM0'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF0'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM5'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF5'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM13'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF13'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM18'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF18'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM25'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF25'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM35'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF35'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM45'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF45'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM55'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF55'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['OT']['DM66'] +=1;
                            $data['OT']['DMT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                        else{
                            $data['OT']['DF66'] +=1;
                            $data['OT']['DFT'] +=1;
                            $data['OT']['DT'] +=1;
                        }
                    }
                    ///end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=0 && $result->age <=4 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM0'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF0'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM5'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF5'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM13'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF13'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM18'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF18'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM25'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF25'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM35'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF35'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM45'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF45'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM55'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF55'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['OHI']['DM66'] +=1;
                            $data['OHI']['DMT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                        else{
                            $data['OHI']['DF66'] +=1;
                            $data['OHI']['DFT'] +=1;
                            $data['OHI']['DT'] +=1;
                        }
                    }
                    ///end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=0 && $result->age <=4 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM0'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF0'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM5'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF5'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM13'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF13'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM18'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF18'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM25'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF25'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM35'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF35'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM45'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF45'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM55'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF55'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['PR']['DM66'] +=1;
                            $data['PR']['DMT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                        else{
                            $data['PR']['DF66'] +=1;
                            $data['PR']['DFT'] +=1;
                            $data['PR']['DT'] +=1;
                        }
                    }
                    ///end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=0 && $result->age <=4 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM0'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF0'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    if($result->age>=5 && $result->age <=12 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM5'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF5'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM13'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF13'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM18'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF18'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM25'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF25'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM35'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF35'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM45'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF45'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM55'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF55'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    if($result->age>=66 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['IC']['DM66'] +=1;
                            $data['IC']['DMT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                        else{
                            $data['IC']['DF66'] +=1;
                            $data['IC']['DFT'] +=1;
                            $data['IC']['DT'] +=1;
                        }
                    }
                    ///end of Issuance of Med Cert
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
            'PESC' => transformDataGrouped($data['PE'], ['S', 'C']),
            // 'PEC' => transformDataGrouped($data['PE'], 'C'),
            'PEH' => transformDataGrouped($data['PE'], ['H','E','D']),
            // 'PEE' => transformDataGrouped($data['PE'], 'E'),
            // 'PED' => transformDataGrouped($data['PE'], 'D'),
            'EES' => transformDataGrouped($data['EE'], ['S', 'C']),
            // 'EEC' => transformDataGrouped($data['EE'], 'C'),
            'EEH' => transformDataGrouped($data['EE'], ['H','E','D']),
            // 'EEE' => transformDataGrouped($data['EE'], 'E'),
            // 'EED' => transformDataGrouped($data['EE'], 'D'),
            'OPS' => transformDataGrouped($data['OP'], ['S', 'C']),
            // 'OPC' => transformDataGrouped($data['OP'], 'C'),
            'OPH' => transformDataGrouped($data['OP'], ['H','E','D']),
            // 'OPE' => transformDataGrouped($data['OP'], 'E'),
            // 'OPD' => transformDataGrouped($data['OP'], 'D'),
            'EXS' => transformDataGrouped($data['EX'], ['S', 'C']),
            // 'EXC' => transformDataGrouped($data['EX'], 'C'),
            'EXH' => transformDataGrouped($data['EX'], ['H','E','D']),
            // 'EXE' => transformDataGrouped($data['EX'], 'E'),
            // 'EXD' => transformDataGrouped($data['EX'], 'D'),
            'PTOS' => transformDataGrouped($data['PTO'], ['S', 'C']),
            // 'PTOC' => transformDataGrouped($data['PTO'], 'C'),
            'PTOH' => transformDataGrouped($data['PTO'], ['H','E','D']),
            // 'PTOE' => transformDataGrouped($data['PTO'], 'E'),
            // 'PTOD' => transformDataGrouped($data['PTO'], 'D'),
            'TTOS' => transformDataGrouped($data['TTO'], ['S', 'C']),
            // 'TTOC' => transformDataGrouped($data['TTO'], 'C'),
            'TTOH' => transformDataGrouped($data['TTO'], ['H','E','D']),
            // 'TTOE' => transformDataGrouped($data['TTO'], 'E'),
            // 'TTOD' => transformDataGrouped($data['TTO'], 'D'),
            'FRS' => transformDataGrouped($data['FR'], ['S', 'C']),
            // 'FRC' => transformDataGrouped($data['FR'], 'C'),
            'FRH' => transformDataGrouped($data['FR'], ['H','E','D']),
            // 'FRE' => transformDataGrouped($data['FR'], 'E'),
            // 'FRD' => transformDataGrouped($data['FR'], 'D'),
            'TFCS' => transformDataGrouped($data['TFC'], ['S', 'C']),
            // 'TFCC' => transformDataGrouped($data['TFC'], 'C'),
            'TFCH' => transformDataGrouped($data['TFC'], ['H','E','D']),
            // 'TFCE' => transformDataGrouped($data['TFC'], 'E'),
            // 'TFCD' => transformDataGrouped($data['TFC'], 'D'),
            'TFGS' => transformDataGrouped($data['TFG'], ['S', 'C']),
            // 'TFGC' => transformDataGrouped($data['TFG'], 'C'),
            'TFGH' => transformDataGrouped($data['TFG'], ['H','E','D']),
            // 'TFGE' => transformDataGrouped($data['TFG'], 'E'),
            // 'TFGD' => transformDataGrouped($data['TFG'], 'D'),
            'SES' => transformDataGrouped($data['SE'], ['S', 'C']),
            // 'SEC' => transformDataGrouped($data['SE'], 'C'),
            'SEH' => transformDataGrouped($data['SE'], ['H','E','D']),
            // 'SEE' => transformDataGrouped($data['SE'], 'E'),
            // 'SED' => transformDataGrouped($data['SE'], 'D'),
            'TASS' => transformDataGrouped($data['TAS'], ['S', 'C']),
            // 'TASC' => transformDataGrouped($data['TAS'], 'C'),
            'TASH' => transformDataGrouped($data['TAS'], ['H','E','D']),
            // 'TASE' => transformDataGrouped($data['TAS'], 'E'),
            // 'TASD' => transformDataGrouped($data['TAS'], 'D'),
            'OTS' => transformDataGrouped($data['OT'], ['S', 'C']),
            // 'OTC' => transformDataGrouped($data['OT'], 'C'),
            'OTH' => transformDataGrouped($data['OT'], ['H','E','D']),
            // 'OTE' => transformDataGrouped($data['OT'], 'E'),
            // 'OTD' => transformDataGrouped($data['OT'], 'D'),
            'OHIS' => transformDataGrouped($data['OHI'], ['S', 'C']),
            // 'OHIC' => transformDataGrouped($data['OHI'], 'C'),
            'OHIH' => transformDataGrouped($data['OHI'], ['H','E','D']),
            // 'OHIE' => transformDataGrouped($data['OHI'], 'E'),
            // 'OHID' => transformDataGrouped($data['OHI'], 'D'),
            'PRS' => transformDataGrouped($data['PR'], ['S', 'C']),
            // 'PRC' => transformDataGrouped($data['PR'], 'C'),
            'PRH' => transformDataGrouped($data['PR'], ['H','E','D']),
            // 'PRE' => transformDataGrouped($data['PR'], 'E'),
            // 'PRD' => transformDataGrouped($data['PR'], 'D'),
            'ICS' => transformDataGrouped($data['IC'], ['S', 'C']),
            // 'ICC' => transformDataGrouped($data['IC'], 'C'),
            'ICH' => transformDataGrouped($data['IC'], ['H','E','D']),
            // 'ICE' => transformDataGrouped($data['IC'], 'E'),
            // 'ICD' => transformDataGrouped($data['IC'], 'D'),
        ];
            return response()->json(
                $response

            );
            // return $result->age;

        }



        // return $results;
            // return response()->json([
            //     'status' => 'success',
            //     'data' => $results,
            // ], 200);
    }




}
