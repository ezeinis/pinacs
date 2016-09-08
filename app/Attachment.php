<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Homework;

class Attachment extends Model
{
    protected $table='attachments';

    public function homework()
    {
        return $this->belongsTo(Homework::class,'homework_id','id');
    }
}
