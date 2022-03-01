<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $table = 'work';
    protected $fillable = [
        'name',
        'icon',
        'description',
        'external_link',
        'image',
        'type_id',
        'thumbnail',
        'system_name',
        'description',
        'status',
    ];
    public function type()
    {
        return $this->belongsTo(TypeWorks::class, 'type_id')->where('status', 'active');
    }

    protected $appends = ['file_url', 'thumbnail_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/works/'. $this->image;
    }

    public function getThumbnailUrlAttribute()
    {
        return asset('').'files/images/works/'. $this->thumbnail;
    }

    public function childs()
    {
        return $this->hasMany(WorksHistory::class, 'work_id')->where('status', 'active');
    }
}
