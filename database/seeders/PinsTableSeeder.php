<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pins')->insert([
            'user_id' => 1,
            'latitude' => 37.11720682060212,
            'longitude' => 138.24995199598507,
            'picture' => '',
            'pin_name' => '高田城址公園',
            'detail' => '高田城址公園です。',
            'pin_flag' => 0,
            'like_count' => fake()-> randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('pins')->insert([
            'user_id' => 1,
            'latitude' => 37.158159544020826, 
            'longitude' =>  138.20418228174947,
            'picture' => '',
            'pin_name' => '春日山城跡',
            'detail' => '春日山城跡です。',
            'pin_flag' => 0,
            'like_count' => fake()-> randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('pins')->insert([
            'user_id' => 1,
            'latitude' => 37.18496938615054,
            'longitude' =>  138.2350813268282,
            'picture' => '',
            'pin_name' => '上越市立水族博物館 うみがたり',
            'detail' => '上越市立水族博物館 うみがたりです。',
            'pin_flag' => 0,
            'like_count' => fake()-> randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
