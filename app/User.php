<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Sentinel;
use App\RoleUser;
use App\Role;
use App\Assign;
use App\ClassYear;
use App\Homework;
use App\Grade;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()

    {
        return $this->belongsToMany(Role::class,'role_users','user_id','role_id');
    }

    public function classes()
    {
        return $this->belongsToMany(ClassYear::class,'assigns','user_id','class_year_id');
    }

    public function homeworks_created()
    {
        return $this->hasMany(Homework::class,'user_id','id');
    }

    public function student_homeworks_grades()
    {
        return $this->hasMany(Grade::class,'student_id','id');
    }
}

