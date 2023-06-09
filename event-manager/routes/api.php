<?php

use App\Http\Controllers\EventController;
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

Route::prefix('/v1')->group(function () {
    Route::get('/events', [EventController::class, 'list']);
    Route::get('/active-events', [EventController::class, 'list_active']);
    Route::get('/events/{id}', [EventController::class, 'view']);
    Route::post('/events', [EventController::class, 'create']);
    Route::put('/events/{id}', [EventController::class, 'update']);
    Route::patch('/events/{id}', [EventController::class, 'partial_update']);
    Route::delete('/events/{id}', [EventController::class, 'delete']);
});
