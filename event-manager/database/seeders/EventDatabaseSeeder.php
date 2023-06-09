<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Uid\Uuid;

class EventDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 5; $i++) {
            $plusRandomStartDays = rand(1, 50);
            $plusRandomEndDays = rand(1, 50) + $plusRandomStartDays;

            DB::table('events')->insert([
                'id' => Uuid::v1()->generate(),
                'name' => 'Event ' . $i,
                'slug' => 'event-' . $i,
                'createAt' => date('Y-m-d H:i:s'),
                'updateAt' => date('Y-m-d H:i:s'),
                'startAt' => date('Y-m-d H:i:s', strtotime($plusRandomStartDays . ' days')),
                'endAt' => date('Y-m-d H:i:s', strtotime($plusRandomEndDays . ' days')),
            ]);
        }
    }
}
