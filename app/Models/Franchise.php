<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;
    protected $table="franchise";
    private $primary_key="franchise_id";
    protected $fillable = [
        'user_id',
        'franchise_id',
        'owner_name',
        'state',
        'address',
        'adhar_card_no',
        'pan_card_no',
        'center_address',
        'center_contact_no',
        'tenure',
        'adhar_card_img',
        'signature',
        'pan_card',
        'passport_photo'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

   
}



