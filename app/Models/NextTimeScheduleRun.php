<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NextTimeScheduleRun extends Model
{
    use SoftDeletes;

    protected $table = 'next_time_schedule_run';
    protected $fillable = [
        'id',
        'command_name',
        'last_status',
        'last_execute',
        'next_execute',
        'detail_error',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'last_execute' => 'datetime',
        'next_execute' => 'datetime',
    ];
}
