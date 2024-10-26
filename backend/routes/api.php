<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TeethController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\HolidayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/tokens/create', function (Request $request) {
    $credentials = $request->only('school_id_number', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('my-token');
        return ['token' => $token->plainTextToken];
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('school_id_number', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('my-token');
        return ['token' => $token->plainTextToken];
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
});


Route::middleware('auth:sanctum')->group (function (){

    Route::post('/logout', function (Request $request) {
        // Check if the user is authenticated
        if ($user = $request->user()) {
            // Delete all tokens for the authenticated user
            $user->tokens()->delete();

            return response()->json(['message' => 'All tokens have been deleted'], 200);
        }

        return response()->json(['message' => 'User not authenticated'], 401);
    });

    // GET USER DETAILS
    Route::prefix('user')->group(function () {
        Route::get('user_details', [UserManagementController::class, 'user_details']);
        Route::put('user_details_update', [UserManagementController::class, 'user_details_update']);
    });

    // TEETH
    Route::prefix('teeth')->group(function () {
        Route::post('store', [TeethController::class, 'store']);
        Route::post('update/{patient_id}', [TeethController::class, 'update']);
        Route::get('fetch/{patient_id}', [TeethController::class, 'fetch']);
        Route::get('index', [TeethController::class, 'index']);
    });

    // HOLIDAYS
    Route::prefix('holiday')->group(function () {
        Route::get('show', [HolidayController::class, 'show']);
        Route::post('store', [HolidayController::class, 'store']);
        Route::put('update', [HolidayController::class, 'update']);
        Route::delete('delete', [HolidayController::class, 'delete']);
    });

    // APPOINTMENT
    Route::prefix('appointment')->group(function () {
        Route::get('show', [AppointmentController::class, 'show']);
        Route::get('show_date', [AppointmentController::class, 'show_date']);
        Route::post('store', [AppointmentController::class,'store']);
        Route::put('update', [AppointmentController::class,'update']);
        Route::delete('delete', [AppointmentController::class,'delete']);
    });

    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('total_patients', [PatientController::class, 'total_patients']);
        // add something later
    });

});

// USER ACCOUNT REGISTRATION
Route::prefix('user')->group(function () {
    Route::post('register', [UserManagementController::class, 'register']);
});
