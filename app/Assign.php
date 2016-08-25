<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ClassYear;

class Assign extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class_year()
    {
        return $this->belongsTo(ClassYear::class);
    }
}
