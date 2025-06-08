<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentLedger extends Model
{
    //

    protected $table = 'student_ledgers';

    protected $fillable = [
        'original_amount',
        'amount_paid',
        'balance',
        'student_id',
        'discount_amount_applied',
        'status',
        'net_amount_due',
        'academic_year_id',
        'fee_id',
    ];

    protected function casts(): array {
        return [
            'original_amount'               =>      'decimal:2',
            'amount_paid'                   =>      'decimal:2',
            'balance'                       =>      'decimal:2',
            'discount_amount_applied'       =>      'decimal:2',
            'net_amount_due'                =>      'decimal:2',
        ];
    }


    //Relationship with other tables here

    public function student(): BelongsTo
    {
        return $this->belongsTo(Students::class);
    }

    public function studentLedger(): BelongsTo
    {
        return $this->belongsTo(StudentLedger::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function paymentAllocations(): HasMany   
    {
        return $this->hasMany(PaymentAllocations::class);
    }
}
