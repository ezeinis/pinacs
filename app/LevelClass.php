<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LevelClass;
use App\ClassYear;
use Carbon\Carbon;

class LevelClass extends Model
{
    protected $table = 'level_classes';

    public function classes()
    {
        $current_date = Carbon::today();
        return $this->hasMany(ClassYear::class,'level_class_id','id')->where('starting','<=',$current_date)->where('ending','>=',$current_date);
    }

    public function classes_history()
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
