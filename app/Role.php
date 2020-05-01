<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'name_ar'
    ];
    public function Users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
