<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use App\ClassYear;
use App\Http\Requests;

class TeacherController extends Controller
{
    public function getHome()
    {
        return view('protected.teacher.teacher_dashboard');
    }

    public function showClasses()
    {
        $user = Sentinel::getUser();
        $user=User::where('id',$user->id)->with('classes.level_class.level','classes.students')->get();
        $user=$user[0];
        //dd($user['classes'][0]);
        return view('protected.teacher.classes_list',compact('user'));
    }

    public function showClassStudents($class_id)
    {
        $class = ClassYear::where('id',$class_id)->with('level_class')->get();
        $class_name = $class[0]['level_class']->name;
        //dd($class_name);
        $students=User::whereHas('classes',function($q) use ($class_id){
            $q->where('class_years.id',$class_id);
        })->whereHas('roles',function($q){
            $q->where('name','Students');
        })->get();
        //dd($students);
        return view('protected.teacher.students_class_list',compact('students','class_name'));
    }
}
