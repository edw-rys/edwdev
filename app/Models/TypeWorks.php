<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeWorks extends Model
{
    protected $table = 'type_works';
    protected $fillable = [
        'name',
        'icon',
        'system_name',
        'description',
        'status',
    ];
    public function items()
    {
        return $this->hasMany(Works::class, 'type_id')->where('status', 'active');
    }
}
