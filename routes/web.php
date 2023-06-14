<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'events'
], function() {
    // /events -> Show all events in the table (search and pagination has bonus point). Last column should display 2 buttons on each row to update and delete the event
    // /events/{id} -> Show individual event
    // /events/create -> Create an event
    // /events/{id}/edit -> Edit an event
    Route::get('/', [EventController::class, 'index'])->name('event.index');
    Route::get('/{id}', [EventController::class, 'detail'])->name('event.detail');
    Route::get('/create/event', [EventController::class, 'createEvent'])->name('event.create');
    Route::get('/{id}/edit', [EventController::class, 'updateEvent'])->name('event.update');
    Route::post('/create/event', [EventController::class, 'createEventAction'])->name('event.create.action');
    Route::post('/{id}/edit', [EventController::class, 'updateEventAction'])->name('event.update.action');
    Route::get('/{id}/delete', [EventController::class, 'deleteEventAction'])->name('event.delete.action');
});

require __DIR__.'/auth.php';

