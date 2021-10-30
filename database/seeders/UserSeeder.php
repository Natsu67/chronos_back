<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'login' => "ashp",
            'full_name' => Str::random(10),
            'email' => 'dableboble@gmail.com',
            'password' => Hash::make('ashp'),
            'region' => "ua",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \DB::table('users')->insert([
            'login' => "user1",
            'full_name' => Str::random(10),
            'email' => 'user1@gmail.com',
            'password' => Hash::make('user1'),
            'region' => "ua",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \DB::table('users')->insert([
            'login' => "user2",
            'full_name' => Str::random(10),
            'email' => 'user2@gmail.com',
            'password' => Hash::make('user2'),
            'region' => "al",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \DB::table('users')->insert([
            'login' => "user3",
            'full_name' => Str::random(10),
            'email' => 'user3@gmail.com',
            'password' => Hash::make('user3'),
            'region' => "ae",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \DB::table('users')->insert([
            'login' => "user4",
            'full_name' => Str::random(10),
            'email' => 'user4@gmail.com',
            'password' => Hash::make('user4'),
            'region' => "uy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
