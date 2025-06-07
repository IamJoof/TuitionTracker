<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentAllocations extends Model
{
    

    protected $table = "payment_allocations";

    protected $fillable = [
        'payment_id',
        'student_id',
        'allocated_amount',
    ];

    protected function casts(): array {
        return [
            'allocated_amount'      =>      'decimal:2',
        ];
    }

    // Relations to other tables here and functions for services needed for API


}
