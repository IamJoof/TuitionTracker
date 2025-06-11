<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->group(function() {
        Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/admin-test', function() {
        return response()->json(['message' => 'Welcome, Admin Popots']);
    })->middleware('can:is_admin');
});

Route::prefix('students')->group(function() {
    Route::post('/', [App\Http\Controllers\API\StudentController::class, 'store']);
    Route::get('{student}/age', [App\Http\Controllers\API\StudentController::class, 'calculateStudentAge']);
});