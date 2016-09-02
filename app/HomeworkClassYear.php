<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Homework;

class HomeworkClassYear extends Model
{
    //
    protected $table='homework_class_years';

    public function homework()
    {
        return $this->belongsTo(Homework::class,'homework_id','id');
    }
}
