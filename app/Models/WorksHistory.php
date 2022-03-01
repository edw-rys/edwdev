<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorksHistory extends Model
{
    protected $table = 'works_history';
    protected $fillable = [
        'title',
        'image',
        'description',
        'system_name',
        'external_link',
        'work_id',
        'status',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function items()
    {
        return $this->hasMany(WorksHistoryContent::class, 'work_history_id')->where('status', 'active');
    }
    protected $appends = ['file_url'];
    public function getFileUrlAttribute()
    {
        return asset('').'files/images/works/'. $this->image;
    }

}
