<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Throwable;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\Event\UpsertEventFormRequest;

class EventController extends Controller {

    public function index() {
        $events = Event::paginate(3);
        return view('event.index', compact('events'));
    }

    public function detail($id) {
        $event = Event::where('id', $id)
                        ->first();
        return view('event.detail', compact('event'));

    }

    public function createEvent() {
        return view('event.create');
    }

    public function updateEvent($id) {
        $event = Event::where('id', $id)
                        ->first();
        return view('event.edit', compact('event'));

    }

    public function createEventAction(UpsertEventFormRequest $request) {
        DB::beginTransaction();
        try {
            $insertData = [
                'name' => $request->name,
                'slug' => $request->slug,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at
            ];
            Event::create($insertData);
            Session::flash('message', 'Create Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
        }
        DB::commit();
        return redirect()->route('event.index');
    }

    public function updateEventAction(UpsertEventFormRequest $request, $id) {
        DB::beginTransaction();
        try {
            $event = Event::where('id', $id)->first();
            $updateData = [
                'name' => $request->name,
                'slug' => $request->slug,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at
            ];
           
            $event->update($updateData);
            $event->save();
            Session::flash('message', 'Update Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
        }
        DB::commit();
        return redirect()->route('event.index');
    }

    public function deleteEventAction($id) {
        DB::beginTransaction();
        try {
            $event = Event::where('id', $id)
                            ->first();
            if(empty($event)) {
                Session::flash('message', 'Event not found');
            } else {
                $event->delete();
                Session::flash('message', 'Delete Successfully');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
        }
        DB::commit();
        return redirect()->route('event.index');
    }

}
?>