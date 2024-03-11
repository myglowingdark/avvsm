<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallet';

    protected $fillable = [
        'franchise_id', 
        'amount',
        'transactionid',
        'transaction_ss',
        'paid_status',
        'comments',

    ];

    // Add any additional relationships or methods as needed
}
