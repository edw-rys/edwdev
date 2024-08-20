<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsuladoMailsNotificados extends Model
{
    use SoftDeletes;

    protected $table = 'consulado_mails_notifieds';
    protected $fillable = [
        'id',
        'user',
        'emails',
        'max_date',
        'response',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
