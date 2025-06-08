<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Students extends Model
{

    protected $table = 'students';


    protected $fillable = [ 
        'lrn_number',
        'student_id_number',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'date_of_birth',
        'gender',
        'year_level',
        'status',
        'contact_number',
        'is_discounted',
        'address',
        'created_by_user_id',
        'current_academic_year_id',
    ];

    protected function casts(): array{

        return [
            'address'            =>         'string',
            'date_of_birth'      =>         'date',
            'is_discounted'      =>         'boolean',
            'gender'             =>         'string',
            'year_level'         =>         'string',
            'status'             =>         'string'
        ];
    }



    //Relationships with other tables

    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function current_academic_year() : BelongsTo
    {
        return $this->belongsTo(AcademicYear::class, 'current_academic_year_id');
    }

    public function studentLedger(): HasMany
    {
        return $this->hasMany(related: StudentLedger::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(related: Payments::class);
    }

    public function activityLogs(): MorphMany
    {
        return $this->morphMany(related: ActivityLogs::class, name: 'loggable');
    }
}
