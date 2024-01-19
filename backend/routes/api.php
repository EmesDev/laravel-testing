<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CalledController;
use App\Http\Controllers\OwnerControler;
use App\Http\Controllers\ServiceRecordsController;
use App\Http\Controllers\VehicleController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'auth']);
Route::apiResource('owners', OwnerControler::class);
// Route::post('owners/paginate', [OwnerControler::class, 'paginate']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('vehicles', VehicleController::class);
    Route::apiResource('records', ServiceRecordsController::class);
    Route::apiResource('calleds', CalledController::class);
});

