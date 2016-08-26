<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LevelClass;
use App\Assign;

class ClassYear extends Model
{
    public function level_class()
    {
        return $this->belongsTo(LevelClass::class);
    }

    public function students()
    {
        return $this->hasMany(Assign::class)->where('role','Students');
    }

    public function teachers()
    {
        return $this->hasMany(Assign::class)->where('role','Teachers');
    }

    public function assigns()
    {
        return $this->hasMany(Assign::class);
    }

    public function no_students()
    {
        return $this->hasMany(Assign::class);
    }
}