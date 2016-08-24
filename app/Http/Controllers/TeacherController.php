<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TeacherController extends Controller
{
    public function getHome()
    {
        return view('protected.teacher.teacher_dashboard');
    }
}
