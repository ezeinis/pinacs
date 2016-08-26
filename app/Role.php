<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\RoleUser;

class Role extends Model
{
    protected $table = 'roles';

    public function role_user()
    {
        return $this->hasMany(RoleUser::class);
    }
}
