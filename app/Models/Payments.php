<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{

    protected $table = 'payments';

    protected $fillable = [
        'student_id',
        'user_id',
        'academic_year_id',
        'amount_paid',
        'payment_date',
    ];

    protected function casts(): array {

        return [
            'amount_paid'       =>          'decimal:2',
            'payment_date'      =>          'date',

        ];
    }

    //Relationships to other tables and functions for API purposes

    
}
