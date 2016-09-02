<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use App\ClassYear;
use App\Homework;
use App\HomeworkClassYear;
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

    public function showHomeworks($class_index)
    {
        //get user
        $user = Sentinel::getUser();
        $user=User::where('id',$user->id)->with('current_class.level_class','current_class.homeworks')->get();
        $user=$user[0];
        //get current class
        //dd($user);
        $current_classes_teaching=$user['current_class'];
        //get homeworks
        $homeworks_for_first_class=$user['current_class'][$class_index]['homeworks'];
        //dd($user);
        return view('protected.teacher.homeworks_list',compact('current_classes_teaching','homeworks_for_first_class','class_index'));
    }

    public function editHomeworkView($class_index,$homework_id)
    {
        //get user
        $homework=HomeworkClassYear::where('id',$homework_id)->with('homework')->get()[0];
        //dd($homework);
        return view('protected.teacher.homework_edit_view',compact('homework','homework_id','class_index'));
    }

    public function editHomework(Request $request)
    {
        $homework=HomeworkClassYear::where('id',$request->id)->with('homework')->get()[0];
        $homework->start_date=$request->starting_date;
        $homework->due_date=$request->ending_date;
        $homework->save();
        $homework['homework']->text=$request->text;
        $homework['homework']->save();
        return redirect('/teacher/homeworks/'.$request->class_index);
    }

    public function addHomeworkView()
    {
        //get user
        $user = Sentinel::getUser();
        $user=User::where('id',$user->id)->with('current_class.level_class','current_class.homeworks')->get();
        $user=$user[0];
        //get current class
        //dd($user);
        $current_classes_teaching=$user['current_class'];
        //dd($current_classes_teaching);
        return view('protected.teacher.homework_add_view',compact('current_classes_teaching'));
    }

    public function addHomework(Request $request)
    {
        $user = Sentinel::getUser();
        $homework = new Homework;
        $homework->user_id=$user->id;
        $homework->text=$request->text;
        $homework->type="homework";
        $homework->save();
        $homework_class_year = new HomeworkClassYear;
        $homework_class_year->homework_id=$homework->id;
        $homework_class_year->class_year_id=$request->class;
        $homework_class_year->start_date=$request->starting_date;
        $homework_class_year->due_date=$request->ending_date;
        $homework_class_year->save();

        return redirect('/teacher/homeworks/0');
    }
}
