<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enquiryForm extends Model
{
    use HasFactory;
    protected $table="enquiryform";
    protected $primary_key="id";

    protected $fillable = [
        'center',
        'counselor_name',
        'candidate_name',
        'father_name',
        'contact_no',
        'whatsapp_no',
        'gender',
        'email',
        'marital_status',
        'birth_date',
        'date_of_birth',
        'qualification',
        'interested_course',
        'interested_course_duration',
        'suggested_course',
        'suggested_course_duration',
        'actual_fee',
        'course_fee',
        'discount_fee',
        'state',
        'district',
        'pincode',
        'address',
        'remark',
        'enquiry_date',
        'date_of_enquiry',
    ];
}
