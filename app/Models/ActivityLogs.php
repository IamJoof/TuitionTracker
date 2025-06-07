<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class ActivityLogs extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'user_id',
        'action_type',
        'description',
        'loggable_type',
        'loggable_id',
        'details_before',
        'details_after',
        'ip_address',
        'user_agent',
    ];

    public function casts(): array {
        
        return [
            'details_before'            =>               'array',
            'details_after'             =>               'array',
        ];
    }

    public function loggable(): MorphTo {
        return $this->morphTo();
    }

    //Relationship to other table is here

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
