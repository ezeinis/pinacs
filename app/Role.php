<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\RoleUser;

class Role extends Model
{
    protected $table = 'roles';

    public function users()
    {
        return $this->belongsToMany(User::class,'role_users','role_id','user_id');
    }
}
