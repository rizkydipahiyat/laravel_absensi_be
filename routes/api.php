<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/update-profile', [AuthController::class, 'updateProfile'])->middleware('auth:sanctum');

// company
Route::get('/company', [CompanyController::class, 'show'])->middleware('auth:sanctum');

// check in
Route::post('/checkin', [AttendanceController::class, 'checkIn'])->middleware('auth:sanctum');
Route::post('/checkout', [AttendanceController::class, 'checkOut'])->middleware('auth:sanctum');
Route::get('/is-checkin', [AttendanceController::class, 'isCheckedin'])->middleware('auth:sanctum');


// create permission
Route::apiResource('/api-permissions', PermissionController::class)->middleware('auth:sanctum');

// notes
Route::apiResource('/api-notes', NoteController::class)->middleware('auth:sanctum');
