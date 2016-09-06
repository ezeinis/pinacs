<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClassYear;
use App\Assign;

class AdminTransferController extends Controller
{
    public function index($class_index)
    {
        $classes = ClassYear::with('level_class','students')->orderBy('school_year','DESC')->get();
        //dd($classes);
        return view('protected.admin.transfer_students',compact('classes','class_index'));
    }

    public function transferStudents(Request $request)
    {
        $classes = ClassYear::with('level_class','students')->orderBy('school_year','DESC')->get();
        //echo $request->student;
        foreach ($request->student as $student_id => $student_new_class_index) {
            $assign = new Assign;
            $assign->class_year_id=$classes[$student_new_class_index]->id;
            $assign->user_id=$student_id;
            $assign->save();
        }
        return redirect('/admin/transfer/students/0');
    }
}
