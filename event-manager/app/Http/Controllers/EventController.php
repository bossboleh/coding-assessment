<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    private $fieldValidations = [
        'name' => 'string|required|max:255',
        'slug' => 'string|required|regex:^[a-zA-Z\-0-9]+$'
    ];

    /** ################## API ################## */
    /**
     * List all events.
     * @return string
     */
    public function list()
    {

        $events = Event::all();

        return $events->toJson();
    }

    /**
     * List active events.
     * @return string
     */
    public function list_active()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $events = DB::table('events')
            ->where(
                "start_at",
                ">=",
                $currentDateTime
            )
            ->where(
                "end_at",
                "<=",
                $currentDateTime
            )
            ->get();
        return $events->toJson();
    }

    /**
     * Create an event
     */
    public function create(Request $request, Event $event)
    {
        $validated = $request->validate($this->fieldValidations);

        Event::create($validated);
    }

    /**
     * Update an event
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate($this->fieldValidations);

        $event->save($validated);
    }

    /**
     * Partially update an event
     */
    public function partial_update(Request $request, Event $event)
    {
        $validated = $request->validate($this->fieldValidations);

        $event->update($validated);
    }

    /**
     * Show an event
     */
    public function view($id)
    {
        return Event::where("id", $id)->get();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Event $event)
    {
        $event->delete();
    }
}
