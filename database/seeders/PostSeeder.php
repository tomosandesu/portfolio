<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Post::create([
            // 'date' =>'2023-08-10',
            // 'bed_time_start' => '23:30:00',
            // 'bed_time_end' => '07:00:00', 
            // 'body_temperature' => 36.6,
            // 'phone_time' => '0~29', 
            // 'exercise_time' => 30,
            // 'job_time' => 6,
            // 'bathing_time' => 10,
            // 'performance' => '⭐️⭐️',
            // 'user_id' => 1
        // ]);
            App\Models\Post::factory(18)->create();
        
    }
}
