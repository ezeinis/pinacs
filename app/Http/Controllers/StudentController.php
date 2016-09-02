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
        //get user
        $user = Sentinel::getUser();
        $user=User::where('id',$user->id)->with('current_class.level_class','current_class.homeworks')->get();
        $user=$user[0];
        //get current class
        //dd($user);
        $current_class=$user['current_class'][0]['level_class'];
        //get homeworks
        $homeworks=$user['current_class'][0]['homeworks'];

        return view('protected.student.homeworks_list',compact('current_class','homeworks'));
    }
}
