<?php

namespace Database\Seeders;

use App\Models\Bodydata;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BodydataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodydatas')->insert(
            [
                'user_id' => 1,
                'name' => 'ダミー1',
                'height' => 178,
                'current_weight' => 70.5,
                'target_weight' => 67.0,
            ]
        );
    }
}
