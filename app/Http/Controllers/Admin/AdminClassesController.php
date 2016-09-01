<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LevelClass;
use App\ClassYear;

class AdminClassesController extends Controller
{
    public function index()
    {
        $levels = LevelClass::where('parent',NULL)->with('level_classes.classes.students','level_classes.classes.teachers')->get();
        //dd($levels);
        $school_years = ClassYear::groupBy('school_year')->get(['school_year']);
        //dd($levels);
        foreach($levels as $level){
            $levels_tea_st_numbers[$level->id]['Students']=0;
            $levels_tea_st_numbers[$level->id]['Teachers']=0;
        }
        foreach($levels as $level){
            foreach ($level['level_classes'] as $class) {
                foreach ($class['classes'] as $class2) {
                     $levels_tea_st_numbers[$level->id]['Students']+=$class2['students']->count();
                     $levels_tea_st_numbers[$level->id]['Teachers']+=$class2['teachers']->count();
                }
            }
        }

        return view('protected.admin.list_classes',compact('levels','levels_tea_st_numbers','school_years'));
    }

    public function addClassView()
    {
        $levels = LevelClass::where('parent',NULL)->get();
        return view('protected.admin.add_class',compact('levels'));
    }

    public function addLevelView()
    {
        return view('protected.admin.add_level');
    }

    public function addClass(Request $request)
    {
        $class=new LevelClass;
        $class->name=$request->class_name;
        $class->parent=$request->level_name;
        $class->save();

        $class_year=new ClassYear;
        $class_year->school_year=$request->year;
        $class_year->starting=$request->starting_date;
        $class_year->ending=$request->ending_date;
        $class_year->level_class_id=$class->id;
        $class_year->save();

        if($request->redirect=="admin"){
            return redirect('/admin/levelsclasses');
        }elseif($request->redirect=="back"){
            return back();
        }
    }

    public function addLevel(Request $request)
    {
        $level=new LevelClass;
        $level->name=$request->level_name;
        $level->save();
        if($request->redirect=="admin"){
            return redirect('/admin/levelsclasses');
        }elseif($request->redirect=="back"){
            return back();
        }
    }

    public function filterClasses(Request $request)
    {
        $inputs = $request->except('_token');
        $defaults = ["level"=>"all"];
        $filters=array_merge($defaults,$inputs);

        $levels_query = LevelClass::where('parent',NULL)->with('level_classes.classes.students','level_classes.classes.teachers');

        if($filters['level']!='all'){
            $levels_query=$levels_query->where('name',$filters['level']);
        }

        $results=$levels_query->get();
        return $results;
    }
}
