<?php

use App\Models\Owner\OwnerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Owner routes
Route::get('/owners', [OwnerController::class, 'index']);
Route::post('/owners', [OwnerController::class, 'store']);
Route::get('/owners/{id}', [OwnerController::class, 'show']);
Route::post('/owners/{id}', [OwnerController::class, 'update']);
Route::delete('/owners', [OwnerController::class, 'delete']);

