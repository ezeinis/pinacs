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
        return $this->belongsTo(User::class);
    }

    public function assigned_to()
    {
        return $this->belongsToMany(ClassYear::class);
    }
}
