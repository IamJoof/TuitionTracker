<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{

    protected $table = 'payments';

    protected $fillable = [
        'user_id',
        'amount',
        'category',
        'date'
    ];
}
