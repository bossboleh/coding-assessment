<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    /** ################## API ################## */
    /**
     * List all events.
     * @return string
     */
    public function list()
    {
    }

    /**
     * List active events.
     * @return string
     */
    public function list_active()
    {
    }


    /**
     * Create an event
     */
    public function create(Request $request, Event $event)
    {
        //
    }

    /**
     * Update an event
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Partially update an event
     */
    public function partial_update(Request $request, Event $event)
    {
        //
    }
    /**
     * Show an event
     */
    public function view(Event $event)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Event $event)
    {
    }
}
