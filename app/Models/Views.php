<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Views extends Model
{
    protected $table = 'views';
    protected $fillable = [
        'ip_address',
        'mode',
        'field_1',
        'field_2',
        'field_3',
        'id',
        'updated_at',
        'deleted_at',
    ];
}
