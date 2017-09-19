<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
