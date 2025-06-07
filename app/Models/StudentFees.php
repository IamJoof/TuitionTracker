<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
