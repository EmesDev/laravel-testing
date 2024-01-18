<?php

use App\Http\Controllers\CalledController;
use App\Http\Controllers\OwnerControler;
use App\Http\Controllers\ServiceRecordsController;
use App\Http\Controllers\VehicleController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('owners', OwnerControler::class);
Route::apiResource('vehicles', VehicleController::class);
Route::apiResource('records', ServiceRecordsController::class);
Route::apiResource('calleds', CalledController::class);
