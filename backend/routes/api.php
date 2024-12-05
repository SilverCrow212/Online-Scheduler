<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TeethController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\PrintablesController;
use App\Http\Controllers\PendingAccountsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\Auth\SecurityQuestionController;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;

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
// USE THIS FOR TESTING PURPOSES ONLY ---DELETE THIS ROUTE LATER
    $credentials = $request->only('school_id_number', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('my-token');
        return ['token' => $token->plainTextToken];
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
});

// USER LOGIN
Route::post('/login', function (Request $request) {
    $credentials = $request->only('school_id_number', 'password');

    // Check if the user exists with the provided credentials
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check if the user's status is 0
        if ($user->status == 0) {
            return response()->json(['message' => 'Your account is inactive'], 403); // Forbidden
        }

        // If the status is not 0, proceed to create a token
        $expiration = Carbon::now()->addMinutes(60);
        $token = $user->createToken('my-token', ['*'], $expiration);

        return ['token' => $token->plainTextToken];
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
});

// USER ACCOUNT REGISTRATION
Route::prefix('user')->group(function () {
    Route::post('register', [UserManagementController::class, 'register']);
});


Route::middleware('auth:sanctum')->group (function (){

    Route::post('/sendemail', function (Request $request) {
        // return $request->details['email'];
        // Ensure 'details' is passed correctly as an array or object
        $appointmentDate = $request->details['appointment_date'] ?? 'Unknown date';
        $appointmentTime = $request->details['appointment_time'] ?? 'Unknown time';
        $name = $request->details['firstname'] .' '. $request->details['lastname'];
        // Construct the message with the passed data
        $name = "Good Day! {$name} Your appointment for {$appointmentDate} at {$appointmentTime} is cancelled. \nDue to the doctor's cancellation, I encourage you to visit the university dental clinic or set another appointment. \n This is an automated email. Please do not reply.";
        // I encourage you to visit the university dental clinic or set another appointment
        // This is an automated email. Please do not reply
        // Send the email using the Mailable class
        Mail::to($request->details['email'])->send(new MyEmail($name));

        return response()->json(['message' => 'Email sent successfully']);
    });

    // USER LOGOUT
    Route::post('/logout', function (Request $request) {
        // Check if the user is authenticated
        if ($user = $request->user()) {
            // Delete all tokens for the authenticated user
            $user->tokens()->delete();

            return response()->json(['message' => 'All tokens have been deleted'], 200);
        }

        return response()->json(['message' => 'User not authenticated'], 401);
    });

    // GET/UPDATE USER DETAILS
    Route::prefix('user')->group(function () {
        // FETCH DETAILS
        Route::get('user_details', [UserManagementController::class, 'user_details']);
        //FETCH DETAILS PATIENT
        Route::get('user_details_patient', [UserManagementController::class, 'user_details_patient']);

        // UPDATE DETAILS
        Route::put('user_details_update', [UserManagementController::class, 'user_details_update']);

        // UPDATE PASSWORD
        Route::post('change_password', [UserManagementController::class,'change_password']);

        // UPDATE EMAIL
        Route::post('change_email', [UserManagementController::class,'change_email']);
        // DEACTIVATE ACCOUNT
        Route::post('activate_account', [UserManagementController::class,'activateAccount']);
        // REACTIVATE ACCOUNT
        Route::post('deactivate_account', [UserManagementController::class,'deactivateAccount']);
    });

    // TEETH
    Route::prefix('teeth')->group(function () {
        Route::post('store', [TeethController::class, 'store']);
        Route::post('update/{appointment_id}', [TeethController::class, 'update']);
        Route::get('fetch/{appointment_id}', [TeethController::class, 'fetch']);
        Route::get('fetchuser/{appointment_id}', [TeethController::class, 'fetchUserDetails']);
        // Route::get('index', [TeethController::class, 'index']);
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
        // PER PATIENT
        Route::get('show_all', [AppointmentController::class, 'show_all']);
        Route::post('store', [AppointmentController::class,'store']);
        Route::put('update', [AppointmentController::class,'update']);
        Route::delete('delete', [AppointmentController::class,'delete']);
        // CONSENT
        Route::post('store_informed_consent', [AppointmentController::class,'store_informed_consent']);
        Route::post('get_informed_consent/{id}', [AppointmentController::class,'get_informed_consent']);
        // ALL APPOINTMENTS WITHIN A SPECIFIC DATE
        Route::get('show_all_by_date', [AppointmentController::class, 'show_all_by_date']);
        Route::get('show_all_by_date_disabled', [AppointmentController::class, 'show_all_by_date_disabled']);
    });

    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('total_patients', [PatientController::class, 'total_patients']);
        // add something later
    });

    // SHOW ALL PATIENTS
    Route::get('all_patients', [PatientController::class,'all_patients']);

    // LOGS {pass 'date' parameter if needed | Default date = current date}
    Route::get('logs', [LogsController::class,'showLogs']);

    // Print Records
    Route::get('print_records', [PrintablesController::class,'show']);

    // Export Report
    Route::get('export_report', [PrintablesController::class,'exportReport']);

    // UPDATE SECURITY QUESTION
    Route::post('/update-security-question', [UserManagementController::class, 'updateSecurityQuestion']);

    // BACKUP / RESTORE
    // Route::get('database/backup', [BackupController::class, 'backup']);
    // Route::post('database/restore', [BackupController::class, 'restore']);

    Route::get('/test-mysqldump', function () {
        $process = new Symfony\Component\Process\Process(['mysqldump', '--version']);
        $process->run();

        return $process->getOutput() ?: $process->getErrorOutput();
    });

    // BACKUP / RESTORE
    Route::get('database/backup', [BackupController::class, 'backup']);
    Route::post('database/restore', [BackupController::class, 'restore']);


    Route::get('getpendingaccounts', [PendingAccountsController::class, 'get_list']);
    Route::delete('/pendingaccounts/{id}', [PendingAccountsController::class, 'deletePendingAccount']);

});
Route::post('savependingaccounts', [PendingAccountsController::class, 'save']);


// SECURITY QUESTIONS
Route::get('security-question', [SecurityQuestionController::class, 'getSecurityQuestion']);

// FORGOT PASSWORD
Route::post('/verify-security-question', [SecurityQuestionController::class, 'verifySecurityAnswer']);
Route::post('/reset-password', [SecurityQuestionController::class, 'resetPassword']);
