<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="student";
    public $timestamps = true;
    protected $primary_key="student_id";

    protected $fillable = 
    [
    'student_id',
    'center', 
    'year', 
    'student_name', 
    'father_name',
    'contact_no',
    'gender',
    'email',
    'marital_status',
    'course_duration',
    'address',
    'course_name',
    'date_of_birth',
    'state',
    'district',
    'date_of_admission',
    'student_signature',
    'profile_photo',
];



    public function franchise()
    {
        return $this->belongsTo(Franchise::class,"center","franchise_id");
    }
    public function course()
    {
        return $this->belongsTo(Courses::class,'course_name');
    }
}
