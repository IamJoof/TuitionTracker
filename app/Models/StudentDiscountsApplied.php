<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentDiscountsApplied extends Model
{
    //

    protected $table = 'student_discounts_applieds';

    protected $fillable = [
        'amount_applied',
        'notes',
        'discount_id',
        'student_ledger_id',
        'applied_by_user_id',
    ];

    protected function casts(): array {
        return [
            'amount_applied'    =>      'decimal:2',
            'notes'             =>      'string',
        ];
    }

    //Relationship here

    public function studentLedger(): BelongsTo
    {
        return $this->belongsTo(StudentLedger::class);
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class,'applied_by_user_id');
    }
}
