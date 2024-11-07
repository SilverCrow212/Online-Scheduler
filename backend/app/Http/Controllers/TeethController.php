<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use DB;
use Illuminate\Http\Request;

class TeethController extends Controller
{
    //

    public function index(){}

    public function store(Request $request){
        // return $request;
        $appointmentId = $request->appointment_id;
        $firstPage = $request->firstPageData;
        // return $firstPage;
        $secondPage = $request->secondPageData;
        // return $secondPage['toothnumber'];
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
        $services_rendered = json_encode($secondPage['services_rendered']);
        $firstPage = json_encode($firstPage);
        DB::table('clinical_details')->insert([
            'appointment_id' => $appointmentId,
            'firstPage' => $firstPage,
            'services_rendered' => $services_rendered,
            'tooth_number' => $secondPage['tooth_number'],
            'medicine_prescribed' => $secondPage['medicine_prescribed'],
            'remarks' => $secondPage['remarks'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('appointment')
        ->where('id', $appointmentId)
        ->update([
            'status' => $request->appointment['status'],
            'updated_at' => Carbon::now(),
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Teeth data stored successfully'
        ]);

    }

    public function update(Request $request, $appointment_id) {
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

        $patientTeethData = $request->input('teethData');

        foreach ($teethMapping as $key => $table) {
            $teethData = $patientTeethData[$key] ?? null;

            if (!is_null($teethData)) {
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
        // return $request->secondPageData['medicine_prescribed'];
        $firstPage = json_encode($request->firstPageData);

        DB::table('clinical_details')
            ->where('appointment_id', $appointment_id)
            ->update([
                'firstPage' => $firstPage,
                'services_rendered'=> $request->secondPageData['services_rendered'],
                'tooth_number' => $request->secondPageData['tooth_number'],
                'medicine_prescribed'=> $request->secondPageData['medicine_prescribed'],
                'remarks'=>$request->secondPageData['remarks'],
                'updated_at' => Carbon::now(),
            ]);
            // return $request->appointment;
        DB::table('appointment')
            ->where('id', $appointment_id)
            ->update([
                'status' => $request->appointment,
                'updated_at' => Carbon::now(),
            ]);

        return response()->json([
            'message' => 'Teeth data updated successfully',
            'teethData' => $patientTeethData,
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
        $clinicalRecord = DB::table('clinical_details')->where('appointment_id', $appointment_id)->first();

        // return response()->json($clinicalRecord);
        $otherRecords =[
            'id' => $clinicalRecord->id,
            'appointment_id' => $clinicalRecord->appointment_id,
            'firstPage' => json_decode($clinicalRecord->firstPage),
            'services_rendered' => json_decode($clinicalRecord->services_rendered),
            'tooth_number' => $clinicalRecord->tooth_number,
            'medicine_prescribed' => $clinicalRecord->medicine_prescribed,
            'remarks' => $clinicalRecord->remarks,
        ];

        $appointment = DB::table('appointment')->where('id', $appointment_id)->first();
        return response()->json([
            'teethData' => $teethData,
            'clinicalRecord' => $otherRecords,
            'appointment' => $appointment
        ]);
    }

}
