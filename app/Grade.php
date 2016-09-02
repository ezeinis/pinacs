<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ClassYear;

class Grade extends Model
{
    protected $table="grades";

    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }

    public function class()
    {
        return $this->belongsTo(ClassYear::class,'class_year_id','id');
    }
}
