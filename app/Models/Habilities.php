<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilities extends Model
{
    protected $appends = ['name', 'total'];
    public function getNameAttribute()
    {
        return $this->title;
    }

    public function getTotalAttribute()
    {
        return $this->percetage;
    }

}
