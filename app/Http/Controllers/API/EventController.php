<?php

namespace App\Http\Controllers\API;

use DB;
use Throwable;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use App\Http\Requests\Event\UpsertEventRequest;

class EventController extends Controller {

    public function showAllEvents() {

        return Event::all();

    }

    public function showActiveEvents() {

        return Event::where('start_at', '<=', Carbon::now()->format('Y-m-d H:i:s'))
                    ->where('end_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
                    ->get();

    }

    public function showEvent($id) {

        return Event::where('id', $id)
                    ->first();

    }

    public function createEvent(UpsertEventRequest $request) {
        
        DB::beginTransaction();

        try {

            Event::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ]);

            DB::commit();

            return 'Create Event ' . $request->name . ' Successfully.';

        } catch (Throwable $e) {

            DB::rollback();

            return $e;

        }
        
    }

    public function upsertEvent(UpsertEventRequest $request, $id) {

        DB::beginTransaction();

        try {

            $event = [
                'id' => $id,
                'name' => $request->name,
                'slug' => $request->slug,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ];

            Event::upsert($event, ['id']);

            DB::commit();

            return 'Update Or Insert Event ' . $request->name . ' Successfully.';

        } catch (Throwable $e) {

            DB::rollback();

            return $e;

        }
    
    }

    public function updateEvent(UpsertEventRequest $request, $id) {

        DB::beginTransaction();

        try {

            $event = [
                'name' => $request->name,
                'slug' => $request->slug,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ];

            Event::where('id', $id)
                    ->update($event);

            DB::commit();

            return 'Update Event ' . $request->name . ' Successfully.';

        } catch (Throwable $e) {

            DB::rollback();

            return $e;

        }
    }

    public function deleteEvent($id) {

        DB::beginTransaction();

        try {

            $event = Event::where('id', $id)
                            ->first();

            if(empty($event)) {

                return 'Event not found';
            
            } else {

                $event->delete();
                
                DB::commit();
    
                return 'Update Event ' . $event->name . ' Successfully.';
            }

        } catch (Throwable $e) {

            DB::rollback();

            return $e;

        }

    }

}
?>