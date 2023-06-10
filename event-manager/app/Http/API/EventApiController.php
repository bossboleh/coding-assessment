<?php

namespace App\Http\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventApiController extends Controller
{
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
    public function create(Request $request)
    {
        Event::create($request->all());

        return view('events.list');
    }

    /**
     * Save an event
     */
    public function update(Request $request, $eventId)
    {
        /** @var Event */
        $event = Event::find($eventId);
        if (!$event) {
            Event::create($request->all());
        } else {
            $event->save($request->all());
        }
    }

    /**
     * Update an event
     */
    public function partial_update(Request $request, $eventId)
    {
        /** @var Event */
        $event = Event::find($eventId);
        if (isset($event)) {
            $event->update($request->all());
        }
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
        $event->deleted_at = date('Y-m-d H:i:s');
        $event->update();
    }
}
