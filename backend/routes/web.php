<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;


Route::get('/sendemail',function(){
    $name = 'Funny Coder';
    //send appointment time and date
    //Due to doctors cancellation, visit the clinic or reset another appointment

    Mail::to('th3sisitpancit@gmail.com')->send(new myEmail($name));
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
