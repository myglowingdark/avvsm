<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $durations = [
            '1 Month',
            '2 Months',
            '3 Months',
            '4 Months',
            '5 Months',
            '6 Months',
            '7 Months',
            '8 Months',
            '9 Months',
            '10 Months',
            '11 Months',
            '1 Year',
            '2 Years',
            '3 Years',
            '4 Years',
            '5 Years'
        ];
        foreach ($durations as $duration) {
            DB::table('durations')->insert(['name' => $duration]);
        }
        
    }
}
