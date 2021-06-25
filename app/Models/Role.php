<?php

namespace App\Models;
// https://www.nigmacode.com/laravel/roles-de-usuario-en-laravel/
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    protected $table = 'roles';

    protected $fillable = [
        'id',
        'name',
        'description'
    ];
    protected $guard_name = 'web';
}
