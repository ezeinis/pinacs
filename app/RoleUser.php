<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class RoleUser extends Model
{
    public function role_name()

    {
        return Role::find($this->role_id)->name;
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
