<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ConsuladoRegisters extends Model
{
    use SoftDeletes;

    protected $table = 'consulado_registers';
    protected $fillable = [
        'id',
        'cookie',
        'cookie_full',
        'field_1',
        'field_2',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
