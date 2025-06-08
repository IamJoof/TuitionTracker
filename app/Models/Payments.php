<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function student(): BelongsTo
    {
        return $this->belongsTo(Students::class);
    }

    public function processor(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function academicYear(): BelongsTo{
        return $this->belongsTo(AcademicYear::class);
    }

    public function allocations(): HasMany
    {
        return $this->hasMany(PaymentAllocations::class);
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLogs::class);
    }
}
