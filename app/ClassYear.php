<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LevelClass;
use App\Assign;

class ClassYear extends Model
{
    public function class()
    {
        return $this->belongsTo(LevelClass::class);
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
