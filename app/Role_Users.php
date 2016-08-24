<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Role;

class Role_Users extends Model
{
    protected $table = 'role_users';

    public function role_name()

    {
        return Role::find($this->role_id)->name;
    }
}
