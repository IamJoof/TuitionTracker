<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{

    protected $fillable = [ 
        'lrnNumber',
        'studentId',
        'firstName',
        'middleName',
        'lastName',
        'suffix',
        'gender',
        'yearLevel',
        'contactNumber'
    ];

}
