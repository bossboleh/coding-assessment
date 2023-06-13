<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = $this->getEvent();

        foreach($events as $key => $event) {

            if($event['slug'] != null) {

                $eventModel = Event::firstOrNew([
                    "slug" => $event['slug']
                ]);

                if(!$eventModel->exists) {

                    $eventModel->fill($event)->save();

                }

            }

        }
    }

    private function getEvent() {

        return [
            ['name' => 'Name_1',  'slug' => 'Slug_1', 'start_at' => Carbon::today()->subDays(rand(0, 365)), 'end_at' => Carbon::today()->addDays(rand(0, 365))],
            ['name' => 'Name_2',  'slug' => 'Slug_2', 'start_at' => Carbon::today()->subDays(rand(0, 365)), 'end_at' => Carbon::today()->addDays(rand(0, 365))],
            ['name' => 'Name_3',  'slug' => 'Slug_3', 'start_at' => Carbon::today()->subDays(rand(0, 365)), 'end_at' => Carbon::today()->addDays(rand(0, 365))],
            ['name' => 'Name_4',  'slug' => 'Slug_4', 'start_at' => Carbon::today()->subDays(rand(0, 365)), 'end_at' => Carbon::today()->addDays(rand(0, 365))],
            ['name' => 'Name_5',  'slug' => 'Slug_5', 'start_at' => Carbon::today()->subDays(rand(0, 365)), 'end_at' => Carbon::today()->addDays(rand(0, 365))],
        ];
        
    }
}
