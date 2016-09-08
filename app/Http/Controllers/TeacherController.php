<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use App\ClassYear;
use App\Homework;
use App\Attachment;
use App\Grade;
use App\HomeworkClassYear;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

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
        $user=User::where('id',$user->id)->with('current_class.level_class','current_class.homeworks.attachments')->get();
        $user=$user[0];
        //get current class
        //dd($user);
        $current_classes_teaching=$user['current_class'];
        //get homeworks
        if(empty($current_classes_teaching[0])){
            $homeworks_for_first_class=null;
        }else{
            $homeworks_for_first_class=$user['current_class'][$class_index]['homeworks'];
        }

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
        $homework->state=$request->state;
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

    public function addHomework()
    {
        //dd(request()->file('file_1')->getClientOriginalName());
        $user = Sentinel::getUser();
        $homework = new Homework;
        $homework->user_id=$user->id;
        $homework->text=request()->text;
        $homework->type="homework";
        $homework->save();
        $homework_class_year = new HomeworkClassYear;
        $homework_class_year->homework_id=$homework->id;
        $homework_class_year->class_year_id=request()->class;
        $homework_class_year->start_date=request()->starting_date;
        $homework_class_year->due_date=request()->ending_date;
        $homework_class_year->state=request()->state;
        $homework_class_year->save();

        for ($i=1; $i <6 ; $i++) {
            $file=request()->file('file_'.$i);
            if($file!=null){
                $path=$file->store('uploads');
                $attachment = new Attachment;
                $attachment->homework_id=$homework->id;
                $attachment->name=$file->getClientOriginalName();
                $attachment->file_path=$path;
                $attachment->save();
            }
        }

        return redirect('/teacher/homeworks/0');
    }

    public function changeHomeworkState($id,$state)
    {
        $homework=HomeworkClassYear::where('id',$id)->with('homework')->get()[0];
        $homework->state=$state;
        $homework->save();
        return back();
    }

    public function showHomeworkGradesView($homework_id)
    {
        $homework_class_year = HomeworkClassYear::where('id',$homework_id)->with('class_year.students.student_homeworks_grades','homework')->get()[0];
        $students = $homework_class_year['class_year']['students'];
        //dd($students);
        $students_grades=null;
        $students_comments=null;
        foreach ($students as $student_key => $student_value) {
            //dd($student_value['student_homeworks_grades']);
            foreach ($student_value['student_homeworks_grades'] as $homework_key => $homework_value) {
                if($homework_value->homework_id===$homework_class_year['homework']->id){
                    $students_grades[$student_value->id]=$homework_value->grade;
                    $students_comments[$student_value->id]=$homework_value->comment;
                }
            }
            //dd($students_grades);
            //$students_grades[$key]=;
        }
        //dd($students_grades);
        return view('protected.teacher.grades_students_homework',compact('homework_id','students','students_grades','students_comments'));
    }

    public function storeGrades(Request $request)
    {
        $homework_class_year = HomeworkClassYear::where('id',$request->homework_id)->with('homework','class_year.students')->get()[0];
        $homework = $homework_class_year['homework'];

        $class_year = $homework_class_year['class_year'];

        foreach ($request->grade as $key => $value) {
            if($value!==''){
                $grade = Grade::where('homework_id',$homework->id)->where('student_id',$key)->get();
                //dd($grade);
                if(empty($grade[0])){
                    $grade = new Grade;
                    $grade->homework_id=$request->homework_id;
                    $grade->student_id=$key;
                    $grade->teacher_id=$homework->user_id;
                    $grade->class_year_id=$class_year->id;
                    $grade->grade=$value;
                    if($request->comment[$key]==''){
                        $grade->comment=null;
                    }else{
                        $grade->comment=$request->comment[$key];
                    }
                    $grade->save();
                }else{

                    $grade[0]->grade=$value;

                    if($request->comment[$key]==''){
                        $grade[0]->comment=null;
                    }else{
                        $grade[0]->comment=$request->comment[$key];
                    }
                    $grade[0]->save();
                }

            }
        }
        return back();
    }
}
