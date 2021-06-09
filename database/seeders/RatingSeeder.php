<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rating = [
            [
                'id' => 1,
                'theme_completed_id' => 0,
                'user_id' => 0
            ]
        ];
        DB::table('rating')->insert($rating);
    }
}
