<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LevelClass;
use App\ClassYear;

class LevelClass extends Model
{
    protected $table = 'level_classes';

    public function classes()
    {
        return $this->hasMany(ClassYear::class,'level_class_id','id');
    }

    public function level()
    {
        return $this->belongsTo(LevelClass::class,'parent','id');
    }

    public function level_classes()
    {
        return $this->hasMany(LevelClass::class,'parent','id');
    }
}
