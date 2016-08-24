<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    public function getHome()
    {
        return view('protected.student.student_dashboard');
    }
}
