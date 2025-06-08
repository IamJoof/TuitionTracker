<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payments::class);
    }

    public function studentLedger(): BelongsTo
    {
        return $this->belongsTo(StudentLedger::class);
    }

}
