<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Auth;
use Carbon\Carbon;
use Request;

class LogsController extends Controller
{

    public function logAction($action)
    {
        Logs::create([
            'action' => $action,
            'user_id' => Auth::id()
        ]);
    }

    public function showLogs(Request $r){
        // $date  = $r->date ?? Carbon::now()->format('Y-m-d');
        $logs = Logs::get();

        return $logs;
        // ADD CONDITIONS IF NEEDED
    }

}
