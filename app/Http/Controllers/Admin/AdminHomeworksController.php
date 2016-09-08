<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClassYear;
use Carbon\Carbon;
use App\HomeworkClassYear;
use Sentinel;
use App\Attachment;
use App\Homework;
use App\Grade;

class AdminHomeworksController extends Controller
{
    public function showHomeworks($class_index)
    {
        $current_date = Carbon::today();
        $current_classes_teached = ClassYear::with('level_class','homeworks.attachments')->where('starting','<=',$current_date)->where('ending','>=',$current_date)->get();
        //dd(empty($current_classes_teached[0]));
        return view('protected.admin.homeworks_list',compact('current_classes_teached','class_index'));
    }

    public function editHomeworkView($class_index,$homework_id)
    {
        //get user
        $homework=HomeworkClassYear::where('id',$homework_id)->with('homework')->get()[0];
        //dd($homework);
        return view('protected.admin.homework_edit_view',compact('homework','homework_id','class_index'));
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
        return redirect('/admin/homeworks/'.$request->class_index);
    }

    public function changeHomeworkState($id,$state)
    {
        $homework=HomeworkClassYear::where('id',$id)->with('homework')->get()[0];
        $homework->state=$state;
        $homework->save();
        return back();
    }

    public function addHomeworkView()
    {
        //get user
        $current_date = Carbon::today();
        $current_classes_teaching = ClassYear::with('level_class','homeworks')->where('starting','<=',$current_date)->where('ending','>=',$current_date)->get();
        //dd($current_classes_teaching);
        return view('protected.admin.homework_add_view',compact('current_classes_teaching'));
    }

    public function addHomework()
    {
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

        return redirect('/admin/homeworks/0');
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
        return view('protected.admin.grades_students_homework',compact('homework_id','students','students_grades','students_comments'));
    }

    public function storeGrades(Request $request)
    {
        $homework_class_year = HomeworkClassYear::where('id',$request->homework_id)->with('homework','class_year.students')->get()[0];
        $homework = $homework_class_year['homework'];
        dd($homework);
        $class_year = $homework_class_year['class_year'];

        foreach ($request->grade as $key => $value) {
            if($value!==''){
                $grade = Grade::where('homework_id',$homework->id)->where('student_id',$key)->get();

                if(!$grade){
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
