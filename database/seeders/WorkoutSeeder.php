<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workouts')->insert(
            [
                'user_id' => 1,
                'training_category' => '胸',
                'weights' => 92.5,
                'reps' => 1,
                'workcounts' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
