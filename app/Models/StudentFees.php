<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentFees extends Model
{
    //

    protected $table = 'student_fees';


    protected $fillable = [
        'feeName',
        'amount',
        'category',
        'academic_year_id'
    ];

    protected function casts(): array {

        return [
            'amount'      =>      'decimal:2',
            'category'    =>      'string',
        ];

    }


    //Relationship with other tables here

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
