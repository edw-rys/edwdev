<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Services extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'status'
    ];
    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        $imgDir = ($this->image) ;
        if(Storage::exists($imgDir)){
            return asset($imgDir);
        }
        return $imgDir;
        // return asset('avatar/default-profile-3.png');
    }
}
