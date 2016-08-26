<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LevelClass;
use App\ClassYear;

class LevelClass extends Model
{
    public function level_class()
    {
        return $this->belongsTo(LevelClass::class);
    }

    public function class_year()
    {
        return $this->hasMany(ClassYear::class);
    }
}
