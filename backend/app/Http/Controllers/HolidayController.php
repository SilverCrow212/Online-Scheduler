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
        // return $r->holiday['date'];
        return Holidays::create([
            'date' => $r->date,
            'description'  => $r->description,
            'created_at'   => Carbon::now(),
        ]);
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
        return Holidays::where('id', $r->id)->update([
            'date'=> $r->date,
            'description'=> $r->description,
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $r)
    {
        return Holidays::where('id', $r->id)->delete();
    }
}
