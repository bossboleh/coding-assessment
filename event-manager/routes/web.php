<?php

use App\Http\Controllers\EventController;
use App\Models\Event;
use App\Services\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/events')->group(function () {

    //List Events
    Route::get('/page/{page}', function ($currentPage) {
        $paginator = App::make(Paginator::class);

        $activeEvents = Event::where('deleted_at', null);
        $totalRows = $activeEvents->count();

        list($prevPage, $nextPage, $skip, $pageLimit) = $paginator->getPagingNumber($currentPage, $totalRows);
        $events = $activeEvents->limit($pageLimit)->skip($skip)->get();

        return view('events.list', [
            'events' => $events,
            'count' => $totalRows,
            'prevPage' => $prevPage ?: 0,
            'nextPage' => $nextPage ?: 0,
        ]);
    });

    //Create Event
    Route::get('/create', function () {
        return view('events.create');
    });

    //View Event
    Route::get('/{id}', function ($id) {
        return view('events.view', [
            'event' => Event::find($id)
        ]);
    });
});

Route::resource('events', EventController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy']); //->middleware(['auth', 'verified']);
