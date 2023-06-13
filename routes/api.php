<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EventController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1/events'], function() {
    Route::get('/', [EventController::class, 'showAllEvents']);
    Route::get('/active-events', [EventController::class, 'showActiveEvents']);
    Route::get('/{id}', [EventController::class, 'showEvent']);
    Route::post('/', [EventController::class, 'createEvent']);
    Route::put('/{id}', [EventController::class, 'upsertEvent']);
    Route::patch('/{id}', [EventController::class, 'updateEvent'])->name('event.update');
    Route::delete('/{id}', [EventController::class, 'deleteEvent']);
});
