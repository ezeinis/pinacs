<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Http\Requests;
use App\User;
use App\ClassYear;

class ParentController extends Controller
{
    public function getHome()
    {
        return view('protected.parent.parent_dashboard');
    }

    public function showChildClasses($child_id)
    {
        $student=User::where('id',$child_id)->with('classes.level_class.level','current_class')->get()[0];
        //dd($student);
        return view('protected.parent.child_classes_list',compact('student'));
    }

    public function showChildGrades($child_id,$class_id)
    {
        $user = User::where('id',$child_id)->get()[0];
        //dd($user);
        $class = ClassYear::where('id',$class_id)->with('homeworks','level_class')->get()[0];
        //dd($user);
        $homeworks=$class['homeworks'];
        //dd($user);
        $grades=null;
        $comments=null;
        foreach ($user['student_homeworks_grades'] as $key => $value) {
            //dd($value);
            $grades[$value->homework_id]=$value->grade;
            $comments[$value->homework_id]=$value->comment;
        }

        return view('protected.parent.child_class_grades_list',compact('user','class','homeworks','grades','comments'));
    }
}
