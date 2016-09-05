<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Homework;
use App\ClassYear;

class HomeworkClassYear extends Model
{
    //
    protected $table='homework_class_years';

    public function homework()
    {
        return $this->belongsTo(Homework::class,'homework_id','id');
    }

    public function class_year()
    {
        return $this->belongsTo(ClassYear::class,'class_year_id','id');
    }
}
