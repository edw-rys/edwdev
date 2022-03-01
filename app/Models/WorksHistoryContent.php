<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorksHistoryContent extends Model
{
    protected $table = 'works_history_content';
    protected $fillable = [
        'title',
        'image',
        'description',
        'work_history_id',
        'status',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/works/'. $this->image;
    }
}
