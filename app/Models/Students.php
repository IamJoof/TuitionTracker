<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{

    protected $table = 'students';


    protected $fillable = [ 
        'lrn_number',
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'gender',
        'year_level',
        'contact_number',
        'status',
        'is_discounted',
        'date_of_birth',
        'created_by_user_id',
        'current_academic_year_id'
    ];

    protected function casts(): array{

        return [
            'date_of_birth'      =>         'date',
            'is_discounted'      =>         'boolean',
            'gender'             =>         'string',
            'year_level'         =>         'string',
            'status'             =>         'string'
        ];
    }



    //Relationships with other tables
}
