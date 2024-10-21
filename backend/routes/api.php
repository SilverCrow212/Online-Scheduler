<?php

use App\Http\Controllers\TeethController;
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

Route::post('/createacc', [UserManagementController::class, 'register']);

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


    Route::post('/user', function (Request $request) {
        if ($request->user()) {
            return 'UKI BALAY BUTU';
        }
    });

    Route::prefix('teeth')->group(function () {
        Route::post('/store', [TeethController::class, 'store']);
        Route::post('/update/{patient_id}', [TeethController::class, 'update']);
        Route::get('/fetch/{patient_id}', [TeethController::class, 'fetch']);
        Route::get('/index', [TeethController::class, 'index']);
    });

});
