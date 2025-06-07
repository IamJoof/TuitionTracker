<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    //

    protected $table = 'academic_years';

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected function casts(): array {

        return [
            'start_date'     =>         'date',
            'end_date'       =>         'date',
            'is_active'      =>         'boolean',
        ];
        
    }

    // Relationship with other table is here
}
