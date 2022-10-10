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
        'city',
        'region_code',
        'region',
        'region_name',
        'country_code',
        'country_name',
        'continent_code',
        'continent_name',
        'latitude',
        'longitude',
        'timezone',
        'timezone',
        'location_accuracy_radius',
        'updated_at',
        'deleted_at',
        'no_accesible'
    ];
}
