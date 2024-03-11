<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('student')->insert([
        //     'center' => 'ABC',
        //     'email' => 'ket@gmail.com',
        //     'student_id' => '23122001101',
        //     'student_name' => 'ketan',
        //     'father_name' => 'avt',
        //     'year' => '2012',
        //     'profile_photo'=>'1234.jpg',
        //     'student_signature'=>'1237.jpg',
        //     'course_duration'=>'3',
        //     'address'=>'dsds',
        //     'course_name'=>'java',
        //     'state'=>'MH',
        //     'district'=>'pn',
        //     'date_of_admission'=>'1990-01-12',
        //     'register_status'=>'U',

        //     'date_of_birth'=>'1990-01-01', 
        // ]);

        $sql=file_get_contents("C:\\Users\\Shree\\Downloads\\student.sql");
        DB::unprepared($sql);
    }
}
