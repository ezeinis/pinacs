<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ClassYear;

class Homework extends Model
{
    protected $table="homeworks";

    public function teacher()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function assigned_to()
    {
        return $this->belongsToMany(ClassYear::class,'homework_class_years','homework_id','class_year_id')->withPivot('id','start_date','due_date','state');
    }
}
