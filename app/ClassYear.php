<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LevelClass;
use App\Assign;
use App\Homework;

class ClassYear extends Model
{
    protected $table = 'class_years';

    public function users()
    {
        return $this->belongsToMany(User::class,'assigns','class_year_id','user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class,'assigns','class_year_id','user_id')->whereHas('roles',function($query){
            $query->where('name','Students');
        });
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class,'assigns','class_year_id','user_id')->whereHas('roles',function($query){
            $query->where('name','Teachers');
        });
    }

    public function level_class()
    {
        return $this->belongsTo(LevelClass::class,'level_class_id','id');
    }

    public function homeworks()
    {
        return $this->belongsToMany(Homework::class,'homework_class_years','class_year_id','homework_id')->withPivot('id','start_date','due_date');
    }
}
