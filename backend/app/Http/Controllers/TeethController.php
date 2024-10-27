<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class TeethController extends Controller
{
    //

    public function index(){}

    public function store(Request $request){

        $appointmentId = $request->appointment_id;
        $teethData = $request->input('teethData');
        $teethMapping = [
            'tbaby_rightteeth' => 'tbaby_rightteeth',
            'tadult_rightteeth' => 'tadult_rightteeth',
            'bbaby_rightteeth' => 'bbaby_rightteeth',
            'badult_rightteeth' => 'badult_rightteeth',
            'tbaby_leftteeth' => 'tbaby_leftteeth',
            'tadult_leftteeth' => 'tadult_leftteeth',
            'bbaby_leftteeth' => 'bbaby_leftteeth',
            'badult_leftteeth' => 'badult_leftteeth',
        ];

        foreach ($teethData as $teethKey => $teethArray) {

            if (array_key_exists($teethKey, $teethMapping)) {
                $table = $teethMapping[$teethKey];
                $data = ['appointment_id' => $appointmentId];

                foreach ($teethArray as $tooth) {

                    $toothField = 'tooth_' . $tooth['id'];
                    $data[$toothField] = json_encode([
                        'topBox' => $tooth['topBox'],
                        'botBox' => $tooth['botBox'],
                        'class' => $tooth['class']
                    ]);

                }

                DB::table($table)->insert($data);
            }
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Teeth data stored successfully'
        ]);

    }

    public function update(Request $request, $appointment_id){

        $teethMapping = [
            'tbaby_rightteeth' => 'tbaby_rightteeth',
            'tadult_rightteeth' => 'tadult_rightteeth',
            'bbaby_rightteeth' => 'bbaby_rightteeth',
            'badult_rightteeth' => 'badult_rightteeth',
            'tbaby_leftteeth' => 'tbaby_leftteeth',
            'tadult_leftteeth' => 'tadult_leftteeth',
            'bbaby_leftteeth' => 'bbaby_leftteeth',
            'badult_leftteeth' => 'badult_leftteeth',
        ];

        foreach ($teethMapping as $key => $table) {

            $teethData = $request->input($key);

            if ($teethData) {

                $updateData = ['appointment_id' => $appointment_id];

                foreach ($teethData as $toothData) {
                    $toothId = $toothData['id'];
                    unset($toothData['id']);

                    $updateData["tooth_$toothId"] = json_encode($toothData);
                }

                DB::table($table)->updateOrInsert(
                    ['appointment_id' => $appointment_id],
                    $updateData
                );
            }
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Teeth data updated successfully'
        ]);
    }
    public function fetch($appointment_id){

        $teethMapping = [
            'tbaby_rightteeth' => 'tbaby_rightteeth',
            'tadult_rightteeth' => 'tadult_rightteeth',
            'bbaby_rightteeth' => 'bbaby_rightteeth',
            'badult_rightteeth' => 'badult_rightteeth',
            'tbaby_leftteeth' => 'tbaby_leftteeth',
            'tadult_leftteeth' => 'tadult_leftteeth',
            'bbaby_leftteeth' => 'bbaby_leftteeth',
            'badult_leftteeth' => 'badult_leftteeth',
        ];

        $teethData = [];

        foreach ($teethMapping as $key => $table) {

            $record = DB::table($table)->where('appointment_id', $appointment_id)->first();

            if ($record) {

                unset($record->id, $record->appointment_id);

                $teethData[$key] = [];
                foreach ($record as $toothKey => $toothJson) {
                    $toothData = json_decode($toothJson, true);


                    $toothId = (int) str_replace('tooth_', '', $toothKey);
                    $toothData['id'] = $toothId;

                    $teethData[$key][] = $toothData;
                }
            }
        }

        return response()->json($teethData);
    }

}
