<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use App\Http\Requests;

class StudentController extends Controller
{
    public function getHome()
    {
        return view('protected.student.student_dashboard');
    }

    public function showClasses()
    {
        $user = Sentinel::getUser();
        $user=User::where('id',$user->id)->with('classes.level_class.level')->get();
        $user=$user[0];

        return view('protected.student.classes_list',compact('user'));
    }

    public function showHomeworks()
    {
        $user = Sentinel::getUser();
        $user=User::where('id',$user->id)->get();
        $user=$user[0];
    }
}
