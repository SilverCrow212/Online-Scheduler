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
        //     OP:oral_prophylaxis
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
            'patients_examined' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'enrollees_examined' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],

            'patients_treated' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            //until here not yet placed
            'oral_prophylaxis' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'extraction' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'permanent_tooth'=>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'temporary_tooth' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'filling_restoration' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'tooth_filled_comp'=>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'tooth_filled_gic' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'sealant'=>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'tooth_applied_sealant' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'other_treatment'=>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'oral_health_instruction' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'patients_referred' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                    'DFT'=>0,
                    'DT'=>0,
                ],
            'issued_certificate' =>
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
                    'EMT'=>0,
                    'EF13'=>0,
                    'EF18'=>0,
                    'EFT'=>0,
                    'ET'=>0,
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
                            $data['oral_prophylaxis']['SM18'] +=1;
                            $data['oral_prophylaxis']['SMT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['SF18'] +=1;
                            $data['oral_prophylaxis']['SFT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['SM25'] +=1;
                            $data['oral_prophylaxis']['SMT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['SF25'] +=1;
                            $data['oral_prophylaxis']['SFT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['SM35'] +=1;
                            $data['oral_prophylaxis']['SMT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['SF35'] +=1;
                            $data['oral_prophylaxis']['SFT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['SM45'] +=1;
                            $data['oral_prophylaxis']['SMT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['SF45'] +=1;
                            $data['oral_prophylaxis']['SFT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                    }
                    ///end of oral prophylaxis
                    // start of extraction
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['SM18'] +=1;
                            $data['extraction']['SMT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                        else{
                            $data['extraction']['SF18'] +=1;
                            $data['extraction']['SFT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['SM25'] +=1;
                            $data['extraction']['SMT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                        else{
                            $data['extraction']['SF25'] +=1;
                            $data['extraction']['SFT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['SM35'] +=1;
                            $data['extraction']['SMT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                        else{
                            $data['extraction']['SF35'] +=1;
                            $data['extraction']['SFT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['SM45'] +=1;
                            $data['extraction']['SMT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                        else{
                            $data['extraction']['SF45'] +=1;
                            $data['extraction']['SFT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                    }
                    ///end of extraction
                    // start of permanent tooth
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['SM18'] +=1;
                            $data['permanent_tooth']['SMT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['SF18'] +=1;
                            $data['permanent_tooth']['SFT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['SM25'] +=1;
                            $data['permanent_tooth']['SMT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['SF25'] +=1;
                            $data['permanent_tooth']['SFT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['SM35'] +=1;
                            $data['permanent_tooth']['SMT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['SF35'] +=1;
                            $data['permanent_tooth']['SFT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['SM45'] +=1;
                            $data['permanent_tooth']['SMT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['SF45'] +=1;
                            $data['permanent_tooth']['SFT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                    }
                    ///end of permanent tooth
                    // start of temporary tooth
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['SM18'] +=1;
                            $data['temporary_tooth']['SMT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['SF18'] +=1;
                            $data['temporary_tooth']['SFT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['SM25'] +=1;
                            $data['temporary_tooth']['SMT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['SF25'] +=1;
                            $data['temporary_tooth']['SFT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['SM35'] +=1;
                            $data['temporary_tooth']['SMT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['SF35'] +=1;
                            $data['temporary_tooth']['SFT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['SM45'] +=1;
                            $data['temporary_tooth']['SMT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['SF45'] +=1;
                            $data['temporary_tooth']['SFT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                    }
                    ///end of temporary tooth
                    // start of filling/restoration
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['SM18'] +=1;
                            $data['filling_restoration']['SMT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                        else{
                            $data['filling_restoration']['SF18'] +=1;
                            $data['filling_restoration']['SFT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['SM25'] +=1;
                            $data['filling_restoration']['SMT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                        else{
                            $data['filling_restoration']['SF25'] +=1;
                            $data['filling_restoration']['SFT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['SM35'] +=1;
                            $data['filling_restoration']['SMT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                        else{
                            $data['filling_restoration']['SF35'] +=1;
                            $data['filling_restoration']['SFT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['SM45'] +=1;
                            $data['filling_restoration']['SMT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                        else{
                            $data['filling_restoration']['SF45'] +=1;
                            $data['filling_restoration']['SFT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                    }
                    ///end of filling/restoration
                    // start of teeth filled with comp
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['SM18'] +=1;
                            $data['tooth_filled_comp']['SMT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['SF18'] +=1;
                            $data['tooth_filled_comp']['SFT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['SM25'] +=1;
                            $data['tooth_filled_comp']['SMT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['SF25'] +=1;
                            $data['tooth_filled_comp']['SFT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['SM35'] +=1;
                            $data['tooth_filled_comp']['SMT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['SF35'] +=1;
                            $data['tooth_filled_comp']['SFT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['SM45'] +=1;
                            $data['tooth_filled_comp']['SMT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['SF45'] +=1;
                            $data['tooth_filled_comp']['SFT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                    }
                    ///end of teeth filled with comp
                    // start of teeth filled with gic
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['SM18'] +=1;
                            $data['tooth_filled_gic']['SMT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['SF18'] +=1;
                            $data['tooth_filled_gic']['SFT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['SM25'] +=1;
                            $data['tooth_filled_gic']['SMT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['SF25'] +=1;
                            $data['tooth_filled_gic']['SFT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['SM35'] +=1;
                            $data['tooth_filled_gic']['SMT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['SF35'] +=1;
                            $data['tooth_filled_gic']['SFT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['SM45'] +=1;
                            $data['tooth_filled_gic']['SMT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['SF45'] +=1;
                            $data['tooth_filled_gic']['SFT'] +=1;
                        }
                    }
                    ///end of teeth filled with gic
                    // start of Sealant
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['SM18'] +=1;
                            $data['sealant']['SMT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                        else{
                            $data['sealant']['SF18'] +=1;
                            $data['sealant']['SFT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['SM25'] +=1;
                            $data['sealant']['SMT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                        else{
                            $data['sealant']['SF25'] +=1;
                            $data['sealant']['SFT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['SM35'] +=1;
                            $data['sealant']['SMT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                        else{
                            $data['sealant']['SF35'] +=1;
                            $data['sealant']['SFT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['SM45'] +=1;
                            $data['sealant']['SMT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                        else{
                            $data['sealant']['SF45'] +=1;
                            $data['sealant']['SFT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                    }
                    ///end of Sealant
                    // start of Tooth Applied w/ sealant
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['SM18'] +=1;
                            $data['tooth_applied_sealant']['SMT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['SF18'] +=1;
                            $data['tooth_applied_sealant']['SFT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['SM25'] +=1;
                            $data['tooth_applied_sealant']['SMT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['SF25'] +=1;
                            $data['tooth_applied_sealant']['SFT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['SM35'] +=1;
                            $data['tooth_applied_sealant']['SMT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['SF35'] +=1;
                            $data['tooth_applied_sealant']['SFT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['SM45'] +=1;
                            $data['tooth_applied_sealant']['SMT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['SF45'] +=1;
                            $data['tooth_applied_sealant']['SFT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                    }
                    ///end of Tooth Applied w/ sealant
                    // start of Other Treatment
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['SM18'] +=1;
                            $data['other_treatment']['SMT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                        else{
                            $data['other_treatment']['SF18'] +=1;
                            $data['other_treatment']['SFT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['SM25'] +=1;
                            $data['other_treatment']['SMT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                        else{
                            $data['other_treatment']['SF25'] +=1;
                            $data['other_treatment']['SFT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['SM35'] +=1;
                            $data['other_treatment']['SMT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                        else{
                            $data['other_treatment']['SF35'] +=1;
                            $data['other_treatment']['SFT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['SM45'] +=1;
                            $data['other_treatment']['SMT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                        else{
                            $data['other_treatment']['SF45'] +=1;
                            $data['other_treatment']['SFT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                    }
                    ///end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['SM18'] +=1;
                            $data['oral_health_instruction']['SMT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['SF18'] +=1;
                            $data['oral_health_instruction']['SFT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['SM25'] +=1;
                            $data['oral_health_instruction']['SMT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['SF25'] +=1;
                            $data['oral_health_instruction']['SFT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['SM35'] +=1;
                            $data['oral_health_instruction']['SMT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['SF35'] +=1;
                            $data['oral_health_instruction']['SFT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['SM45'] +=1;
                            $data['oral_health_instruction']['SMT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['SF45'] +=1;
                            $data['oral_health_instruction']['SFT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                    }
                    ///end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['SM18'] +=1;
                            $data['patients_referred']['SMT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                        else{
                            $data['patients_referred']['SF18'] +=1;
                            $data['patients_referred']['SFT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['SM25'] +=1;
                            $data['patients_referred']['SMT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                        else{
                            $data['patients_referred']['SF25'] +=1;
                            $data['patients_referred']['SFT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['SM35'] +=1;
                            $data['patients_referred']['SMT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                        else{
                            $data['patients_referred']['SF35'] +=1;
                            $data['patients_referred']['SFT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['SM45'] +=1;
                            $data['patients_referred']['SMT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                        else{
                            $data['patients_referred']['SF45'] +=1;
                            $data['patients_referred']['SFT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                    }
                    ///end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['SM18'] +=1;
                            $data['issued_certificate']['SMT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                        else{
                            $data['issued_certificate']['SF18'] +=1;
                            $data['issued_certificate']['SFT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['SM25'] +=1;
                            $data['issued_certificate']['SMT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                        else{
                            $data['issued_certificate']['SF25'] +=1;
                            $data['issued_certificate']['SFT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['SM35'] +=1;
                            $data['issued_certificate']['SMT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                        else{
                            $data['issued_certificate']['SF35'] +=1;
                            $data['issued_certificate']['SFT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['SM45'] +=1;
                            $data['issued_certificate']['SMT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                        else{
                            $data['issued_certificate']['SF45'] +=1;
                            $data['issued_certificate']['SFT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
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
                            $data['oral_prophylaxis']['CM13'] +=1;
                            $data['oral_prophylaxis']['CMT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['CF13'] +=1;
                            $data['oral_prophylaxis']['CFT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['CM18'] +=1;
                            $data['oral_prophylaxis']['CMT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['CF18'] +=1;
                            $data['oral_prophylaxis']['CFT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['CM25'] +=1;
                            $data['oral_prophylaxis']['CMT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['CF25'] +=1;
                            $data['oral_prophylaxis']['CFT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['CM35'] +=1;
                            $data['oral_prophylaxis']['CMT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['CF35'] +=1;
                            $data['oral_prophylaxis']['CFT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['CM45'] +=1;
                            $data['oral_prophylaxis']['CMT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['CF45'] +=1;
                            $data['oral_prophylaxis']['CFT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['CM55'] +=1;
                            $data['oral_prophylaxis']['CMT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['CF55'] +=1;
                            $data['oral_prophylaxis']['CFT'] +=1;
                            $data['oral_prophylaxis']['CT'] +=1;
                        }
                    }
                    // end of oral prophylaxis
                    // start of extraction
                    if($result->age>=13 && $result->age <=17 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['CM13'] +=1;
                            $data['extraction']['CMT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                        else{
                            $data['extraction']['CF13'] +=1;
                            $data['extraction']['CFT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['CM18'] +=1;
                            $data['extraction']['CMT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                        else{
                            $data['extraction']['CF18'] +=1;
                            $data['extraction']['CFT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['CM25'] +=1;
                            $data['extraction']['CMT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                        else{
                            $data['extraction']['CF25'] +=1;
                            $data['extraction']['CFT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['CM35'] +=1;
                            $data['extraction']['CMT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                        else{
                            $data['extraction']['CF35'] +=1;
                            $data['extraction']['CFT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['CM45'] +=1;
                            $data['extraction']['CMT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                        else{
                            $data['extraction']['CF45'] +=1;
                            $data['extraction']['CFT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['CM55'] +=1;
                            $data['extraction']['CMT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                        else{
                            $data['extraction']['CF55'] +=1;
                            $data['extraction']['CFT'] +=1;
                            $data['extraction']['CT'] +=1;
                        }
                    }
                    // end of extraction
                    // start of Permanent Tooth
                    if($result->age>=13 && $result->age <=17 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['CM13'] +=1;
                            $data['permanent_tooth']['CMT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['CF13'] +=1;
                            $data['permanent_tooth']['CFT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['CM18'] +=1;
                            $data['permanent_tooth']['CMT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['CF18'] +=1;
                            $data['permanent_tooth']['CFT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['CM25'] +=1;
                            $data['permanent_tooth']['CMT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['CF25'] +=1;
                            $data['permanent_tooth']['CFT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['CM35'] +=1;
                            $data['permanent_tooth']['CMT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['CF35'] +=1;
                            $data['permanent_tooth']['CFT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['CM45'] +=1;
                            $data['permanent_tooth']['CMT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['CF45'] +=1;
                            $data['permanent_tooth']['CFT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['CM55'] +=1;
                            $data['permanent_tooth']['CMT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['CF55'] +=1;
                            $data['permanent_tooth']['CFT'] +=1;
                            $data['permanent_tooth']['CT'] +=1;
                        }
                    }
                    // end of Permanent Tooth
                    // start of Temporary Tooth
                    if($result->age>=13 && $result->age <=17 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['CM13'] +=1;
                            $data['temporary_tooth']['CMT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['CF13'] +=1;
                            $data['temporary_tooth']['CFT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['CM18'] +=1;
                            $data['temporary_tooth']['CMT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['CF18'] +=1;
                            $data['temporary_tooth']['CFT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['CM25'] +=1;
                            $data['temporary_tooth']['CMT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['CF25'] +=1;
                            $data['temporary_tooth']['CFT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['CM35'] +=1;
                            $data['temporary_tooth']['CMT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['CF35'] +=1;
                            $data['temporary_tooth']['CFT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['CM45'] +=1;
                            $data['temporary_tooth']['CMT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['CF45'] +=1;
                            $data['temporary_tooth']['CFT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['CM55'] +=1;
                            $data['temporary_tooth']['CMT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['CF55'] +=1;
                            $data['temporary_tooth']['CFT'] +=1;
                            $data['temporary_tooth']['CT'] +=1;
                        }
                    }
                    // end of Temporary Tooth
                    // start of Filling/Restoration
                    if($result->age>=13 && $result->age <=17 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['CM13'] +=1;
                            $data['filling_restoration']['CMT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                        else{
                            $data['filling_restoration']['CF13'] +=1;
                            $data['filling_restoration']['CFT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['CM18'] +=1;
                            $data['filling_restoration']['CMT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                        else{
                            $data['filling_restoration']['CF18'] +=1;
                            $data['filling_restoration']['CFT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['CM25'] +=1;
                            $data['filling_restoration']['CMT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                        else{
                            $data['filling_restoration']['CF25'] +=1;
                            $data['filling_restoration']['CFT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['CM35'] +=1;
                            $data['filling_restoration']['CMT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                        else{
                            $data['filling_restoration']['CF35'] +=1;
                            $data['filling_restoration']['CFT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['CM45'] +=1;
                            $data['filling_restoration']['CMT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                        else{
                            $data['filling_restoration']['CF45'] +=1;
                            $data['filling_restoration']['CFT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['CM55'] +=1;
                            $data['filling_restoration']['CMT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                        else{
                            $data['filling_restoration']['CF55'] +=1;
                            $data['filling_restoration']['CFT'] +=1;
                            $data['filling_restoration']['CT'] +=1;
                        }
                    }
                    // end of Filling/Restoration
                    // start of Tooth filled w/ Comp
                    if($result->age>=13 && $result->age <=17 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['CM13'] +=1;
                            $data['tooth_filled_comp']['CMT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['CF13'] +=1;
                            $data['tooth_filled_comp']['CFT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['CM18'] +=1;
                            $data['tooth_filled_comp']['CMT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['CF18'] +=1;
                            $data['tooth_filled_comp']['CFT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['CM25'] +=1;
                            $data['tooth_filled_comp']['CMT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['CF25'] +=1;
                            $data['tooth_filled_comp']['CFT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['CM35'] +=1;
                            $data['tooth_filled_comp']['CMT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['CF35'] +=1;
                            $data['tooth_filled_comp']['CFT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['CM45'] +=1;
                            $data['tooth_filled_comp']['CMT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['CF45'] +=1;
                            $data['tooth_filled_comp']['CFT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['CM55'] +=1;
                            $data['tooth_filled_comp']['CMT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['CF55'] +=1;
                            $data['tooth_filled_comp']['CFT'] +=1;
                            $data['tooth_filled_comp']['CT'] +=1;
                        }
                    }
                    // end of Tooth filled w/ Comp
                    // start of Tooth filled w/ GIC
                    if($result->age>=13 && $result->age <=17 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['CM13'] +=1;
                            $data['tooth_filled_gic']['CMT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['CF13'] +=1;
                            $data['tooth_filled_gic']['CFT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['CM18'] +=1;
                            $data['tooth_filled_gic']['CMT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['CF18'] +=1;
                            $data['tooth_filled_gic']['CFT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['CM25'] +=1;
                            $data['tooth_filled_gic']['CMT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['CF25'] +=1;
                            $data['tooth_filled_gic']['CFT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['CM35'] +=1;
                            $data['tooth_filled_gic']['CMT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['CF35'] +=1;
                            $data['tooth_filled_gic']['CFT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['CM45'] +=1;
                            $data['tooth_filled_gic']['CMT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['CF45'] +=1;
                            $data['tooth_filled_gic']['CFT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['CM55'] +=1;
                            $data['tooth_filled_gic']['CMT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['CF55'] +=1;
                            $data['tooth_filled_gic']['CFT'] +=1;
                            $data['tooth_filled_gic']['CT'] +=1;
                        }
                    }
                    // end of Tooth filled w/ GIC
                    // start of sealant
                    if($result->age>=13 && $result->age <=17 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['CM13'] +=1;
                            $data['sealant']['CMT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                        else{
                            $data['sealant']['CF13'] +=1;
                            $data['sealant']['CFT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['CM18'] +=1;
                            $data['sealant']['CMT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                        else{
                            $data['sealant']['CF18'] +=1;
                            $data['sealant']['CFT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['CM25'] +=1;
                            $data['sealant']['CMT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                        else{
                            $data['sealant']['CF25'] +=1;
                            $data['sealant']['CFT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['CM35'] +=1;
                            $data['sealant']['CMT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                        else{
                            $data['sealant']['CF35'] +=1;
                            $data['sealant']['CFT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['CM45'] +=1;
                            $data['sealant']['CMT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                        else{
                            $data['sealant']['CF45'] +=1;
                            $data['sealant']['CFT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['CM55'] +=1;
                            $data['sealant']['CMT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                        else{
                            $data['sealant']['CF55'] +=1;
                            $data['sealant']['CFT'] +=1;
                            $data['sealant']['CT'] +=1;
                        }
                    }
                    // end of sealant
                    // start of Tooth Applied w/ sealant
                    if($result->age>=13 && $result->age <=17 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['CM13'] +=1;
                            $data['tooth_applied_sealant']['CMT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['CF13'] +=1;
                            $data['tooth_applied_sealant']['CFT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['CM18'] +=1;
                            $data['tooth_applied_sealant']['CMT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['CF18'] +=1;
                            $data['tooth_applied_sealant']['CFT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['CM25'] +=1;
                            $data['tooth_applied_sealant']['CMT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['CF25'] +=1;
                            $data['tooth_applied_sealant']['CFT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['CM35'] +=1;
                            $data['tooth_applied_sealant']['CMT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['CF35'] +=1;
                            $data['tooth_applied_sealant']['CFT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['CM45'] +=1;
                            $data['tooth_applied_sealant']['CMT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['CF45'] +=1;
                            $data['tooth_applied_sealant']['CFT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['CM55'] +=1;
                            $data['tooth_applied_sealant']['CMT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['CF55'] +=1;
                            $data['tooth_applied_sealant']['CFT'] +=1;
                            $data['tooth_applied_sealant']['CT'] +=1;
                        }
                    }
                    // end of Tooth Applied w/ sealant
                    // start of Other Treatment
                    if($result->age>=13 && $result->age <=17 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['CM13'] +=1;
                            $data['other_treatment']['CMT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                        else{
                            $data['other_treatment']['CF13'] +=1;
                            $data['other_treatment']['CFT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['CM18'] +=1;
                            $data['other_treatment']['CMT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                        else{
                            $data['other_treatment']['CF18'] +=1;
                            $data['other_treatment']['CFT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['CM25'] +=1;
                            $data['other_treatment']['CMT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                        else{
                            $data['other_treatment']['CF25'] +=1;
                            $data['other_treatment']['CFT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['CM35'] +=1;
                            $data['other_treatment']['CMT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                        else{
                            $data['other_treatment']['CF35'] +=1;
                            $data['other_treatment']['CFT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['CM45'] +=1;
                            $data['other_treatment']['CMT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                        else{
                            $data['other_treatment']['CF45'] +=1;
                            $data['other_treatment']['CFT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['CM55'] +=1;
                            $data['other_treatment']['CMT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                        else{
                            $data['other_treatment']['CF55'] +=1;
                            $data['other_treatment']['CFT'] +=1;
                            $data['other_treatment']['CT'] +=1;
                        }
                    }
                    // end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=13 && $result->age <=17 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['CM13'] +=1;
                            $data['oral_health_instruction']['CMT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['CF13'] +=1;
                            $data['oral_health_instruction']['CFT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['CM18'] +=1;
                            $data['oral_health_instruction']['CMT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['CF18'] +=1;
                            $data['oral_health_instruction']['CFT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['CM25'] +=1;
                            $data['oral_health_instruction']['CMT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['CF25'] +=1;
                            $data['oral_health_instruction']['CFT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['CM35'] +=1;
                            $data['oral_health_instruction']['CMT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['CF35'] +=1;
                            $data['oral_health_instruction']['CFT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['CM45'] +=1;
                            $data['oral_health_instruction']['CMT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['CF45'] +=1;
                            $data['oral_health_instruction']['CFT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['CM55'] +=1;
                            $data['oral_health_instruction']['CMT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['CF55'] +=1;
                            $data['oral_health_instruction']['CFT'] +=1;
                            $data['oral_health_instruction']['CT'] +=1;
                        }
                    }
                    // end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=13 && $result->age <=17 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['CM13'] +=1;
                            $data['patients_referred']['CMT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                        else{
                            $data['patients_referred']['CF13'] +=1;
                            $data['patients_referred']['CFT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['CM18'] +=1;
                            $data['patients_referred']['CMT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                        else{
                            $data['patients_referred']['CF18'] +=1;
                            $data['patients_referred']['CFT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['CM25'] +=1;
                            $data['patients_referred']['CMT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                        else{
                            $data['patients_referred']['CF25'] +=1;
                            $data['patients_referred']['CFT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['CM35'] +=1;
                            $data['patients_referred']['CMT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                        else{
                            $data['patients_referred']['CF35'] +=1;
                            $data['patients_referred']['CFT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['CM45'] +=1;
                            $data['patients_referred']['CMT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                        else{
                            $data['patients_referred']['CF45'] +=1;
                            $data['patients_referred']['CFT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['CM55'] +=1;
                            $data['patients_referred']['CMT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                        else{
                            $data['patients_referred']['CF55'] +=1;
                            $data['patients_referred']['CFT'] +=1;
                            $data['patients_referred']['CT'] +=1;
                        }
                    }
                    // end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=13 && $result->age <=17 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['CM13'] +=1;
                            $data['issued_certificate']['CMT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                        else{
                            $data['issued_certificate']['CF13'] +=1;
                            $data['issued_certificate']['CFT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['CM18'] +=1;
                            $data['issued_certificate']['CMT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                        else{
                            $data['issued_certificate']['CF18'] +=1;
                            $data['issued_certificate']['CFT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['CM25'] +=1;
                            $data['issued_certificate']['CMT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                        else{
                            $data['issued_certificate']['CF25'] +=1;
                            $data['issued_certificate']['CFT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['CM35'] +=1;
                            $data['issued_certificate']['CMT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                        else{
                            $data['issued_certificate']['CF35'] +=1;
                            $data['issued_certificate']['CFT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['CM45'] +=1;
                            $data['issued_certificate']['CMT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                        else{
                            $data['issued_certificate']['CF45'] +=1;
                            $data['issued_certificate']['CFT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                    }
                    if($result->age>=55 && $result->age <=65 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['CM55'] +=1;
                            $data['issued_certificate']['CMT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
                        }
                        else{
                            $data['issued_certificate']['CF55'] +=1;
                            $data['issued_certificate']['CFT'] +=1;
                            $data['issued_certificate']['CT'] +=1;
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
                            $data['oral_prophylaxis']['HM13'] +=1;
                            $data['oral_prophylaxis']['HMT'] +=1;
                            $data['oral_prophylaxis']['HT'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['HF13'] +=1;
                            $data['oral_prophylaxis']['HFT'] +=1;
                            $data['oral_prophylaxis']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['HM18'] +=1;
                            $data['oral_prophylaxis']['HMT'] +=1;
                            $data['oral_prophylaxis']['HT'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['HF18'] +=1;
                            $data['oral_prophylaxis']['HFT'] +=1;
                            $data['oral_prophylaxis']['HT'] +=1;
                        }
                    }

                    // end of oral prophylaxis
                    // start of extraction
                    if($result->age>=13 && $result->age <=17 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['HM13'] +=1;
                            $data['extraction']['HMT'] +=1;
                            $data['extraction']['HT'] +=1;
                        }
                        else{
                            $data['extraction']['HF13'] +=1;
                            $data['extraction']['HFT'] +=1;
                            $data['extraction']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['HM18'] +=1;
                            $data['extraction']['HMT'] +=1;
                            $data['extraction']['HT'] +=1;
                        }
                        else{
                            $data['extraction']['HF18'] +=1;
                            $data['extraction']['HFT'] +=1;
                            $data['extraction']['HT'] +=1;
                        }
                    }
                    // end of extraction
                    // start of Permanent Tooth
                    if($result->age>=13 && $result->age <=17 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['HM13'] +=1;
                            $data['permanent_tooth']['HMT'] +=1;
                            $data['permanent_tooth']['HT'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['HF13'] +=1;
                            $data['permanent_tooth']['HFT'] +=1;
                            $data['permanent_tooth']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['HM18'] +=1;
                            $data['permanent_tooth']['HMT'] +=1;
                            $data['permanent_tooth']['HT'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['HF18'] +=1;
                            $data['permanent_tooth']['HFT'] +=1;
                            $data['permanent_tooth']['HT'] +=1;
                        }
                    }

                    // end of Permanent Tooth
                    // start of Temporary Tooth
                    if($result->age>=13 && $result->age <=17 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['HM13'] +=1;
                            $data['temporary_tooth']['HMT'] +=1;
                            $data['temporary_tooth']['HT'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['HF13'] +=1;
                            $data['temporary_tooth']['HFT'] +=1;
                            $data['temporary_tooth']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['HM18'] +=1;
                            $data['temporary_tooth']['HMT'] +=1;
                            $data['temporary_tooth']['HT'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['HF18'] +=1;
                            $data['temporary_tooth']['HFT'] +=1;
                            $data['temporary_tooth']['HT'] +=1;
                        }
                    }
                    // end of Temporary Tooth
                    // start of Filling/Restoration
                    if($result->age>=13 && $result->age <=17 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['HM13'] +=1;
                            $data['filling_restoration']['HMT'] +=1;
                            $data['filling_restoration']['HT'] +=1;
                        }
                        else{
                            $data['filling_restoration']['HF13'] +=1;
                            $data['filling_restoration']['HFT'] +=1;
                            $data['filling_restoration']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['HM18'] +=1;
                            $data['filling_restoration']['HMT'] +=1;
                            $data['filling_restoration']['HT'] +=1;
                        }
                        else{
                            $data['filling_restoration']['HF18'] +=1;
                            $data['filling_restoration']['HFT'] +=1;
                            $data['filling_restoration']['HT'] +=1;
                        }
                    }
                    // end of Filling/Restoration
                    // start of Tooth filled w/ Comp
                    if($result->age>=13 && $result->age <=17 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['HM13'] +=1;
                            $data['tooth_filled_comp']['HMT'] +=1;
                            $data['tooth_filled_comp']['HT'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['HF13'] +=1;
                            $data['tooth_filled_comp']['HFT'] +=1;
                            $data['tooth_filled_comp']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['HM18'] +=1;
                            $data['tooth_filled_comp']['HMT'] +=1;
                            $data['tooth_filled_comp']['HT'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['HF18'] +=1;
                            $data['tooth_filled_comp']['HFT'] +=1;
                            $data['tooth_filled_comp']['HT'] +=1;
                        }
                    }
                    // end of Tooth filled w/ Comp
                    // start of Tooth filled w/ GIC
                    if($result->age>=13 && $result->age <=17 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['HM13'] +=1;
                            $data['tooth_filled_gic']['HMT'] +=1;
                            $data['tooth_filled_gic']['HT'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['HF13'] +=1;
                            $data['tooth_filled_gic']['HFT'] +=1;
                            $data['tooth_filled_gic']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['HM18'] +=1;
                            $data['tooth_filled_gic']['HMT'] +=1;
                            $data['tooth_filled_gic']['HT'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['HF18'] +=1;
                            $data['tooth_filled_gic']['HFT'] +=1;
                            $data['tooth_filled_gic']['HT'] +=1;
                        }
                    }
                    // end of Tooth filled w/ GIC
                    // start of sealant
                    if($result->age>=13 && $result->age <=17 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['HM13'] +=1;
                            $data['sealant']['HMT'] +=1;
                            $data['sealant']['HT'] +=1;
                        }
                        else{
                            $data['sealant']['HF13'] +=1;
                            $data['sealant']['HFT'] +=1;
                            $data['sealant']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['HM18'] +=1;
                            $data['sealant']['HMT'] +=1;
                            $data['sealant']['HT'] +=1;
                        }
                        else{
                            $data['sealant']['HF18'] +=1;
                            $data['sealant']['HFT'] +=1;
                            $data['sealant']['HT'] +=1;
                        }
                    }
                    // end of sealant
                    // start of Tooth Applied w/ sealant
                    if($result->age>=13 && $result->age <=17 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['HM13'] +=1;
                            $data['tooth_applied_sealant']['HMT'] +=1;
                            $data['tooth_applied_sealant']['HT'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['HF13'] +=1;
                            $data['tooth_applied_sealant']['HFT'] +=1;
                            $data['tooth_applied_sealant']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['HM18'] +=1;
                            $data['tooth_applied_sealant']['HMT'] +=1;
                            $data['tooth_applied_sealant']['HT'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['HF18'] +=1;
                            $data['tooth_applied_sealant']['HFT'] +=1;
                            $data['tooth_applied_sealant']['HT'] +=1;
                        }
                    }

                    // end of Tooth Applied w/ sealant
                    // start of Other Treatment
                    if($result->age>=13 && $result->age <=17 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['HM13'] +=1;
                            $data['other_treatment']['HMT'] +=1;
                            $data['other_treatment']['HT'] +=1;
                        }
                        else{
                            $data['other_treatment']['HF13'] +=1;
                            $data['other_treatment']['HFT'] +=1;
                            $data['other_treatment']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['HM18'] +=1;
                            $data['other_treatment']['HMT'] +=1;
                            $data['other_treatment']['HT'] +=1;
                        }
                        else{
                            $data['other_treatment']['HF18'] +=1;
                            $data['other_treatment']['HFT'] +=1;
                            $data['other_treatment']['HT'] +=1;
                        }
                    }
                    // end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=13 && $result->age <=17 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['HM13'] +=1;
                            $data['oral_health_instruction']['HMT'] +=1;
                            $data['oral_health_instruction']['HT'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['HF13'] +=1;
                            $data['oral_health_instruction']['HFT'] +=1;
                            $data['oral_health_instruction']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['HM18'] +=1;
                            $data['oral_health_instruction']['HMT'] +=1;
                            $data['oral_health_instruction']['HT'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['HF18'] +=1;
                            $data['oral_health_instruction']['HFT'] +=1;
                            $data['oral_health_instruction']['HT'] +=1;
                        }
                    }
                    // end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=13 && $result->age <=17 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['HM13'] +=1;
                            $data['patients_referred']['HMT'] +=1;
                            $data['patients_referred']['HT'] +=1;
                        }
                        else{
                            $data['patients_referred']['HF13'] +=1;
                            $data['patients_referred']['HFT'] +=1;
                            $data['patients_referred']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['HM18'] +=1;
                            $data['patients_referred']['HMT'] +=1;
                            $data['patients_referred']['HT'] +=1;
                        }
                        else{
                            $data['patients_referred']['HF18'] +=1;
                            $data['patients_referred']['HFT'] +=1;
                            $data['patients_referred']['HT'] +=1;
                        }
                    }
                    // end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=13 && $result->age <=17 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['HM13'] +=1;
                            $data['issued_certificate']['HMT'] +=1;
                            $data['issued_certificate']['HT'] +=1;
                        }
                        else{
                            $data['issued_certificate']['HF13'] +=1;
                            $data['issued_certificate']['HFT'] +=1;
                            $data['issued_certificate']['HT'] +=1;
                        }
                    }
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['HM18'] +=1;
                            $data['issued_certificate']['HMT'] +=1;
                            $data['issued_certificate']['HT'] +=1;
                        }
                        else{
                            $data['issued_certificate']['HF18'] +=1;
                            $data['issued_certificate']['HFT'] +=1;
                            $data['issued_certificate']['HT'] +=1;
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
                            $data['oral_prophylaxis']['EM13'] +=1;
                            $data['oral_prophylaxis']['EMT'] +=1;
                            $data['oral_prophylaxis']['ET'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['EF13'] +=1;
                            $data['oral_prophylaxis']['EFT'] +=1;
                            $data['oral_prophylaxis']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['EM18'] +=1;
                            $data['oral_prophylaxis']['EMT'] +=1;
                            $data['oral_prophylaxis']['ET'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['EF18'] +=1;
                            $data['oral_prophylaxis']['EFT'] +=1;
                            $data['oral_prophylaxis']['ET'] +=1;
                        }
                    }

                    // end of oral prophylaxis
                    // start of extraction
                    if($result->age>=5 && $result->age <=12 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['EM13'] +=1;
                            $data['extraction']['EMT'] +=1;
                            $data['extraction']['ET'] +=1;
                        }
                        else{
                            $data['extraction']['EF13'] +=1;
                            $data['extraction']['EFT'] +=1;
                            $data['extraction']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['EM18'] +=1;
                            $data['extraction']['EMT'] +=1;
                            $data['extraction']['ET'] +=1;
                        }
                        else{
                            $data['extraction']['EF18'] +=1;
                            $data['extraction']['EFT'] +=1;
                            $data['extraction']['ET'] +=1;
                        }
                    }
                    // end of extraction
                    // start of Permanent Tooth
                    if($result->age>=5 && $result->age <=12 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['EM13'] +=1;
                            $data['permanent_tooth']['EMT'] +=1;
                            $data['permanent_tooth']['ET'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['EF13'] +=1;
                            $data['permanent_tooth']['EFT'] +=1;
                            $data['permanent_tooth']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['EM18'] +=1;
                            $data['permanent_tooth']['EMT'] +=1;
                            $data['permanent_tooth']['ET'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['EF18'] +=1;
                            $data['permanent_tooth']['EFT'] +=1;
                            $data['permanent_tooth']['ET'] +=1;
                        }
                    }

                    // end of Permanent Tooth
                    // start of Temporary Tooth
                    if($result->age>=5 && $result->age <=12 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['EM13'] +=1;
                            $data['temporary_tooth']['EMT'] +=1;
                            $data['temporary_tooth']['ET'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['EF13'] +=1;
                            $data['temporary_tooth']['EFT'] +=1;
                            $data['temporary_tooth']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['EM18'] +=1;
                            $data['temporary_tooth']['EMT'] +=1;
                            $data['temporary_tooth']['ET'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['EF18'] +=1;
                            $data['temporary_tooth']['EFT'] +=1;
                            $data['temporary_tooth']['ET'] +=1;
                        }
                    }
                    // end of Temporary Tooth
                    // start of Filling/Restoration
                    if($result->age>=5 && $result->age <=12 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['EM13'] +=1;
                            $data['filling_restoration']['EMT'] +=1;
                            $data['filling_restoration']['ET'] +=1;
                        }
                        else{
                            $data['filling_restoration']['EF13'] +=1;
                            $data['filling_restoration']['EFT'] +=1;
                            $data['filling_restoration']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['EM18'] +=1;
                            $data['filling_restoration']['EMT'] +=1;
                            $data['filling_restoration']['ET'] +=1;
                        }
                        else{
                            $data['filling_restoration']['EF18'] +=1;
                            $data['filling_restoration']['EFT'] +=1;
                            $data['filling_restoration']['ET'] +=1;
                        }
                    }
                    // end of Filling/Restoration
                    // start of Tooth filled w/ Comp
                    if($result->age>=5 && $result->age <=12 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['EM13'] +=1;
                            $data['tooth_filled_comp']['EMT'] +=1;
                            $data['tooth_filled_comp']['ET'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['EF13'] +=1;
                            $data['tooth_filled_comp']['EFT'] +=1;
                            $data['tooth_filled_comp']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['EM18'] +=1;
                            $data['tooth_filled_comp']['EMT'] +=1;
                            $data['tooth_filled_comp']['ET'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['EF18'] +=1;
                            $data['tooth_filled_comp']['EFT'] +=1;
                            $data['tooth_filled_comp']['ET'] +=1;
                        }
                    }
                    // end of Tooth filled w/ Comp
                    // start of Tooth filled w/ GIC
                    if($result->age>=5 && $result->age <=12 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['EM13'] +=1;
                            $data['tooth_filled_gic']['EMT'] +=1;
                            $data['tooth_filled_gic']['ET'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['EF13'] +=1;
                            $data['tooth_filled_gic']['EFT'] +=1;
                            $data['tooth_filled_gic']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['EM18'] +=1;
                            $data['tooth_filled_gic']['EMT'] +=1;
                            $data['tooth_filled_gic']['ET'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['EF18'] +=1;
                            $data['tooth_filled_gic']['EFT'] +=1;
                            $data['tooth_filled_gic']['ET'] +=1;
                        }
                    }
                    // end of Tooth filled w/ GIC
                    // start of sealant
                    if($result->age>=5 && $result->age <=12 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['EM13'] +=1;
                            $data['sealant']['EMT'] +=1;
                            $data['sealant']['ET'] +=1;
                        }
                        else{
                            $data['sealant']['EF13'] +=1;
                            $data['sealant']['EFT'] +=1;
                            $data['sealant']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['EM18'] +=1;
                            $data['sealant']['EMT'] +=1;
                            $data['sealant']['ET'] +=1;
                        }
                        else{
                            $data['sealant']['EF18'] +=1;
                            $data['sealant']['EFT'] +=1;
                            $data['sealant']['ET'] +=1;
                        }
                    }
                    // end of sealant
                    // start of Tooth Applied w/ sealant
                    if($result->age>=5 && $result->age <=12 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['EM13'] +=1;
                            $data['tooth_applied_sealant']['EMT'] +=1;
                            $data['tooth_applied_sealant']['ET'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['EF13'] +=1;
                            $data['tooth_applied_sealant']['EFT'] +=1;
                            $data['tooth_applied_sealant']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['EM18'] +=1;
                            $data['tooth_applied_sealant']['EMT'] +=1;
                            $data['tooth_applied_sealant']['ET'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['EF18'] +=1;
                            $data['tooth_applied_sealant']['EFT'] +=1;
                            $data['tooth_applied_sealant']['ET'] +=1;
                        }
                    }

                    // end of Tooth Applied w/ sealant
                    // start of Other Treatment
                    if($result->age>=5 && $result->age <=12 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['EM13'] +=1;
                            $data['other_treatment']['EMT'] +=1;
                            $data['other_treatment']['ET'] +=1;
                        }
                        else{
                            $data['other_treatment']['EF13'] +=1;
                            $data['other_treatment']['EFT'] +=1;
                            $data['other_treatment']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['EM18'] +=1;
                            $data['other_treatment']['EMT'] +=1;
                            $data['other_treatment']['ET'] +=1;
                        }
                        else{
                            $data['other_treatment']['EF18'] +=1;
                            $data['other_treatment']['EFT'] +=1;
                            $data['other_treatment']['ET'] +=1;
                        }
                    }
                    // end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=5 && $result->age <=12 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['EM13'] +=1;
                            $data['oral_health_instruction']['EMT'] +=1;
                            $data['oral_health_instruction']['ET'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['EF13'] +=1;
                            $data['oral_health_instruction']['EFT'] +=1;
                            $data['oral_health_instruction']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['EM18'] +=1;
                            $data['oral_health_instruction']['EMT'] +=1;
                            $data['oral_health_instruction']['ET'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['EF18'] +=1;
                            $data['oral_health_instruction']['EFT'] +=1;
                            $data['oral_health_instruction']['ET'] +=1;
                        }
                    }
                    // end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=5 && $result->age <=12 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['EM13'] +=1;
                            $data['patients_referred']['EMT'] +=1;
                            $data['patients_referred']['ET'] +=1;
                        }
                        else{
                            $data['patients_referred']['EF13'] +=1;
                            $data['patients_referred']['EFT'] +=1;
                            $data['patients_referred']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['EM18'] +=1;
                            $data['patients_referred']['EMT'] +=1;
                            $data['patients_referred']['ET'] +=1;
                        }
                        else{
                            $data['patients_referred']['EF18'] +=1;
                            $data['patients_referred']['EFT'] +=1;
                            $data['patients_referred']['ET'] +=1;
                        }
                    }
                    // end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=5 && $result->age <=12 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['EM13'] +=1;
                            $data['issued_certificate']['EMT'] +=1;
                            $data['issued_certificate']['ET'] +=1;
                        }
                        else{
                            $data['issued_certificate']['EF13'] +=1;
                            $data['issued_certificate']['EFT'] +=1;
                            $data['issued_certificate']['ET'] +=1;
                        }
                    }
                    if($result->age>=13 && $result->age <=17 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['EM18'] +=1;
                            $data['issued_certificate']['EMT'] +=1;
                            $data['issued_certificate']['ET'] +=1;
                        }
                        else{
                            $data['issued_certificate']['EF18'] +=1;
                            $data['issued_certificate']['EFT'] +=1;
                            $data['issued_certificate']['ET'] +=1;
                        }
                    }
                    // end of Issuance of Med Cert
                }
            }
            if($result->type==2 && $result->services_rendered){
                foreach(json_decode($result->services_rendered) as $test){
                    // start of oral prophylaxis
                    if($result->age>=18 && $result->age <=24 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['SM18'] +=1;
                            $data['oral_prophylaxis']['SMT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['SF18'] +=1;
                            $data['oral_prophylaxis']['SFT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['SM25'] +=1;
                            $data['oral_prophylaxis']['SMT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['SF25'] +=1;
                            $data['oral_prophylaxis']['SFT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['SM35'] +=1;
                            $data['oral_prophylaxis']['SMT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['SF35'] +=1;
                            $data['oral_prophylaxis']['SFT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==3){
                        if($result->sex == 'Male'){
                            $data['oral_prophylaxis']['SM45'] +=1;
                            $data['oral_prophylaxis']['SMT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                        else{
                            $data['oral_prophylaxis']['SF45'] +=1;
                            $data['oral_prophylaxis']['SFT'] +=1;
                            $data['oral_prophylaxis']['ST'] +=1;
                        }
                    }
                    ///end of oral prophylaxis
                    // start of extraction
                    if($result->age>=18 && $result->age <=24 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['SM18'] +=1;
                            $data['extraction']['SMT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                        else{
                            $data['extraction']['SF18'] +=1;
                            $data['extraction']['SFT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['SM25'] +=1;
                            $data['extraction']['SMT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                        else{
                            $data['extraction']['SF25'] +=1;
                            $data['extraction']['SFT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['SM35'] +=1;
                            $data['extraction']['SMT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                        else{
                            $data['extraction']['SF35'] +=1;
                            $data['extraction']['SFT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==4){
                        if($result->sex == 'Male'){
                            $data['extraction']['SM45'] +=1;
                            $data['extraction']['SMT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                        else{
                            $data['extraction']['SF45'] +=1;
                            $data['extraction']['SFT'] +=1;
                            $data['extraction']['ST'] +=1;
                        }
                    }
                    ///end of extraction
                    // start of permanent tooth
                    if($result->age>=18 && $result->age <=24 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['SM18'] +=1;
                            $data['permanent_tooth']['SMT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['SF18'] +=1;
                            $data['permanent_tooth']['SFT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['SM25'] +=1;
                            $data['permanent_tooth']['SMT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['SF25'] +=1;
                            $data['permanent_tooth']['SFT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['SM35'] +=1;
                            $data['permanent_tooth']['SMT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['SF35'] +=1;
                            $data['permanent_tooth']['SFT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==5){
                        if($result->sex == 'Male'){
                            $data['permanent_tooth']['SM45'] +=1;
                            $data['permanent_tooth']['SMT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                        else{
                            $data['permanent_tooth']['SF45'] +=1;
                            $data['permanent_tooth']['SFT'] +=1;
                            $data['permanent_tooth']['ST'] +=1;
                        }
                    }
                    ///end of permanent tooth
                    // start of temporary tooth
                    if($result->age>=18 && $result->age <=24 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['SM18'] +=1;
                            $data['temporary_tooth']['SMT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['SF18'] +=1;
                            $data['temporary_tooth']['SFT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['SM25'] +=1;
                            $data['temporary_tooth']['SMT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['SF25'] +=1;
                            $data['temporary_tooth']['SFT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['SM35'] +=1;
                            $data['temporary_tooth']['SMT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['SF35'] +=1;
                            $data['temporary_tooth']['SFT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==6){
                        if($result->sex == 'Male'){
                            $data['temporary_tooth']['SM45'] +=1;
                            $data['temporary_tooth']['SMT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                        else{
                            $data['temporary_tooth']['SF45'] +=1;
                            $data['temporary_tooth']['SFT'] +=1;
                            $data['temporary_tooth']['ST'] +=1;
                        }
                    }
                    ///end of temporary tooth
                    // start of filling/restoration
                    if($result->age>=18 && $result->age <=24 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['SM18'] +=1;
                            $data['filling_restoration']['SMT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                        else{
                            $data['filling_restoration']['SF18'] +=1;
                            $data['filling_restoration']['SFT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['SM25'] +=1;
                            $data['filling_restoration']['SMT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                        else{
                            $data['filling_restoration']['SF25'] +=1;
                            $data['filling_restoration']['SFT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['SM35'] +=1;
                            $data['filling_restoration']['SMT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                        else{
                            $data['filling_restoration']['SF35'] +=1;
                            $data['filling_restoration']['SFT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==7){
                        if($result->sex == 'Male'){
                            $data['filling_restoration']['SM45'] +=1;
                            $data['filling_restoration']['SMT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                        else{
                            $data['filling_restoration']['SF45'] +=1;
                            $data['filling_restoration']['SFT'] +=1;
                            $data['filling_restoration']['ST'] +=1;
                        }
                    }
                    ///end of filling/restoration
                    // start of teeth filled with comp
                    if($result->age>=18 && $result->age <=24 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['SM18'] +=1;
                            $data['tooth_filled_comp']['SMT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['SF18'] +=1;
                            $data['tooth_filled_comp']['SFT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['SM25'] +=1;
                            $data['tooth_filled_comp']['SMT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['SF25'] +=1;
                            $data['tooth_filled_comp']['SFT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['SM35'] +=1;
                            $data['tooth_filled_comp']['SMT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['SF35'] +=1;
                            $data['tooth_filled_comp']['SFT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==8){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_comp']['SM45'] +=1;
                            $data['tooth_filled_comp']['SMT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_comp']['SF45'] +=1;
                            $data['tooth_filled_comp']['SFT'] +=1;
                            $data['tooth_filled_comp']['ST'] +=1;
                        }
                    }
                    ///end of teeth filled with comp
                    // start of teeth filled with gic
                    if($result->age>=18 && $result->age <=24 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['SM18'] +=1;
                            $data['tooth_filled_gic']['SMT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['SF18'] +=1;
                            $data['tooth_filled_gic']['SFT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['SM25'] +=1;
                            $data['tooth_filled_gic']['SMT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['SF25'] +=1;
                            $data['tooth_filled_gic']['SFT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['SM35'] +=1;
                            $data['tooth_filled_gic']['SMT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['SF35'] +=1;
                            $data['tooth_filled_gic']['SFT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==9){
                        if($result->sex == 'Male'){
                            $data['tooth_filled_gic']['SM45'] +=1;
                            $data['tooth_filled_gic']['SMT'] +=1;
                            $data['tooth_filled_gic']['ST'] +=1;
                        }
                        else{
                            $data['tooth_filled_gic']['SF45'] +=1;
                            $data['tooth_filled_gic']['SFT'] +=1;
                        }
                    }
                    ///end of teeth filled with gic
                    // start of Sealant
                    if($result->age>=18 && $result->age <=24 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['SM18'] +=1;
                            $data['sealant']['SMT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                        else{
                            $data['sealant']['SF18'] +=1;
                            $data['sealant']['SFT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['SM25'] +=1;
                            $data['sealant']['SMT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                        else{
                            $data['sealant']['SF25'] +=1;
                            $data['sealant']['SFT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['SM35'] +=1;
                            $data['sealant']['SMT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                        else{
                            $data['sealant']['SF35'] +=1;
                            $data['sealant']['SFT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==10){
                        if($result->sex == 'Male'){
                            $data['sealant']['SM45'] +=1;
                            $data['sealant']['SMT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                        else{
                            $data['sealant']['SF45'] +=1;
                            $data['sealant']['SFT'] +=1;
                            $data['sealant']['ST'] +=1;
                        }
                    }
                    ///end of Sealant
                    // start of Tooth Applied w/ sealant
                    if($result->age>=18 && $result->age <=24 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['SM18'] +=1;
                            $data['tooth_applied_sealant']['SMT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['SF18'] +=1;
                            $data['tooth_applied_sealant']['SFT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['SM25'] +=1;
                            $data['tooth_applied_sealant']['SMT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['SF25'] +=1;
                            $data['tooth_applied_sealant']['SFT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['SM35'] +=1;
                            $data['tooth_applied_sealant']['SMT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['SF35'] +=1;
                            $data['tooth_applied_sealant']['SFT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==11){
                        if($result->sex == 'Male'){
                            $data['tooth_applied_sealant']['SM45'] +=1;
                            $data['tooth_applied_sealant']['SMT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                        else{
                            $data['tooth_applied_sealant']['SF45'] +=1;
                            $data['tooth_applied_sealant']['SFT'] +=1;
                            $data['tooth_applied_sealant']['ST'] +=1;
                        }
                    }
                    ///end of Tooth Applied w/ sealant
                    // start of Other Treatment
                    if($result->age>=18 && $result->age <=24 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['SM18'] +=1;
                            $data['other_treatment']['SMT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                        else{
                            $data['other_treatment']['SF18'] +=1;
                            $data['other_treatment']['SFT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['SM25'] +=1;
                            $data['other_treatment']['SMT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                        else{
                            $data['other_treatment']['SF25'] +=1;
                            $data['other_treatment']['SFT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['SM35'] +=1;
                            $data['other_treatment']['SMT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                        else{
                            $data['other_treatment']['SF35'] +=1;
                            $data['other_treatment']['SFT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==12){
                        if($result->sex == 'Male'){
                            $data['other_treatment']['SM45'] +=1;
                            $data['other_treatment']['SMT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                        else{
                            $data['other_treatment']['SF45'] +=1;
                            $data['other_treatment']['SFT'] +=1;
                            $data['other_treatment']['ST'] +=1;
                        }
                    }
                    ///end of Other Treatment
                    // start of Oral Health Instruction
                    if($result->age>=18 && $result->age <=24 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['SM18'] +=1;
                            $data['oral_health_instruction']['SMT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['SF18'] +=1;
                            $data['oral_health_instruction']['SFT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['SM25'] +=1;
                            $data['oral_health_instruction']['SMT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['SF25'] +=1;
                            $data['oral_health_instruction']['SFT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['SM35'] +=1;
                            $data['oral_health_instruction']['SMT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['SF35'] +=1;
                            $data['oral_health_instruction']['SFT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==13){
                        if($result->sex == 'Male'){
                            $data['oral_health_instruction']['SM45'] +=1;
                            $data['oral_health_instruction']['SMT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                        else{
                            $data['oral_health_instruction']['SF45'] +=1;
                            $data['oral_health_instruction']['SFT'] +=1;
                            $data['oral_health_instruction']['ST'] +=1;
                        }
                    }
                    ///end of Oral Health Instruction
                    // start of Referral
                    if($result->age>=18 && $result->age <=24 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['SM18'] +=1;
                            $data['patients_referred']['SMT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                        else{
                            $data['patients_referred']['SF18'] +=1;
                            $data['patients_referred']['SFT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['SM25'] +=1;
                            $data['patients_referred']['SMT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                        else{
                            $data['patients_referred']['SF25'] +=1;
                            $data['patients_referred']['SFT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['SM35'] +=1;
                            $data['patients_referred']['SMT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                        else{
                            $data['patients_referred']['SF35'] +=1;
                            $data['patients_referred']['SFT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==14){
                        if($result->sex == 'Male'){
                            $data['patients_referred']['SM45'] +=1;
                            $data['patients_referred']['SMT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                        else{
                            $data['patients_referred']['SF45'] +=1;
                            $data['patients_referred']['SFT'] +=1;
                            $data['patients_referred']['ST'] +=1;
                        }
                    }
                    ///end of Referral
                    // start of Issuance of Med Cert
                    if($result->age>=18 && $result->age <=24 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['SM18'] +=1;
                            $data['issued_certificate']['SMT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                        else{
                            $data['issued_certificate']['SF18'] +=1;
                            $data['issued_certificate']['SFT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                    }
                    if($result->age>=25 && $result->age <=34 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['SM25'] +=1;
                            $data['issued_certificate']['SMT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                        else{
                            $data['issued_certificate']['SF25'] +=1;
                            $data['issued_certificate']['SFT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                    }
                    if($result->age>=35 && $result->age <=44 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['SM35'] +=1;
                            $data['issued_certificate']['SMT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                        else{
                            $data['issued_certificate']['SF35'] +=1;
                            $data['issued_certificate']['SFT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                    }
                    if($result->age>=45 && $result->age <=54 && $test->id==15){
                        if($result->sex == 'Male'){
                            $data['issued_certificate']['SM45'] +=1;
                            $data['issued_certificate']['SMT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                        else{
                            $data['issued_certificate']['SF45'] +=1;
                            $data['issued_certificate']['SFT'] +=1;
                            $data['issued_certificate']['ST'] +=1;
                        }
                    }
                    ///end of Issuance of Med Cert
                }
            }


            return $data;
            // return $result->age;

        }



        // return $results;
            // return response()->json([
            //     'status' => 'success',
            //     'data' => $results,
            // ], 200);
    }




}
