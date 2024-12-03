<?php

namespace App\Http\Controllers;

use App\Models\Holidays;
use Carbon\Carbon;
use Illuminate\Http\Request;
class HolidayController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $holiday = Holidays::create([
            'date' => $r->date,
            'description'  => $r->description,
            'created_at'   => Carbon::now(),
        ]);

        $logsController = new LogsController();
        $logsController->logAction('created holiday: '.$r->date. ' description:'. $r->description.' created at:'.Carbon::now());
    }

    /**
     * Display the specified resource.
     */
    public function show(Holidays $holidays)
    {
        return Holidays::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Holidays $holidays)
    {
        Holidays::where('id', $r->id)->update([
            'date'=> $r->date,
            'description'=> $r->description,
            'updated_at' => Carbon::now(),
        ]);

        $logsController = new LogsController();
        $logsController->logAction('updated holiday: '.$r->date. ' description:'. $r->description.' created at:'.Carbon::now());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $r)
    {
        Holidays::where('id', $r->id)->delete();

        $logsController = new LogsController();
        $logsController->logAction('deleted holiday: '.$r->id);
    }
}
