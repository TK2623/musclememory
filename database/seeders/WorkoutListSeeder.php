<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkoutListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workout_lists')->insert(
            [
                'user_id' => 1,
                'chest' => 'ベンチプレス',
                'shoulder' => 'サイドレイズ',
                'back' => '懸垂',
                'arm' => 'ダンベルカール',
                'abdominal' => 'アブローラー',
                'leg' => 'スクワット',
                'other' => 'デッドリフト',
            ]
        );
    }
}
