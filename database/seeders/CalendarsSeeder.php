<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CalendarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('calendars')->insert([
            'title' => "kek",
            'description' => Str::random(30),
            'user_id' => 1,
            "main" => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \DB::table('calendars')->insert([
            'title' => "mem",
            'description' => Str::random(30),
            'user_id' => 1,
            "main" => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \DB::table('calendars')->insert([
            'title' => "user2_calendar_main",
            'description' => Str::random(30),
            'user_id' => 2,
            "main" => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \DB::table('calendars')->insert([
            'title' => "user3_calendar_not_main",
            'description' => Str::random(30),
            'user_id' => 3,
            "main" => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \DB::table('calendars')->insert([
            'title' => "user3_calendar_main",
            'description' => Str::random(30),
            'user_id' => 3,
            "main" => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
