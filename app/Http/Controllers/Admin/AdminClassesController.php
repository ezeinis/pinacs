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
        $levels = LevelClass::where('level_class_id',NULL)->with('classes.class_year.students','classes.class_year.teachers')->get();
        //dd($levels);
        foreach($levels as $level){
            $levels_tea_st_numbers[$level->id]['Students']=0;
            $levels_tea_st_numbers[$level->id]['Teachers']=0;
        }
        foreach($levels as $level){
            foreach ($level['classes'] as $class) {
                foreach ($class['class_year'] as $class2) {
                    $levels_tea_st_numbers[$level->id]['Students']+=count($class2['students']);
                    $levels_tea_st_numbers[$level->id]['Teachers']+=count($class2['teachers']);
                }
            }
        }
        //dd($levels_tea_st_numbers);
        //$classes = ClassYear::with('level_class','students','teachers')->get();
        //echo $classes[0]['class'];
        //dd($levels);

        //sunolo teacher students gia levels
        // foreach($levels as $level){
        //     $levels_tea_st_numbers[$class['level_class']->level_class_id]['Students']=0;
        //     $levels_tea_st_numbers[$class['level_class']->level_class_id]['Teachers']=0;
        // }
        // foreach($levels as $level){
        //     $levels_tea_st_numbers[$class['level_class']->level_class_id]['Students']+=count($class['students']);
        //     $levels_tea_st_numbers[$class['level_class']->level_class_id]['Teachers']+=count($class['teachers']);
        // }
        // dd($levels_tea_st_numbers);

        return view('protected.admin.list_classes',compact('levels','levels_tea_st_numbers'));
    }

    public function addClassView()
    {
        return view('protected.admin.add_class');
    }

    public function addLevelView()
    {
        return view('protected.admin.add_level');
    }

    public function addClass(Request $request)
    {
        if($request->redirect=="admin"){
            return redirect('/admin/classes');
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
            return redirect('/admin/classes');
        }elseif($request->redirect=="back"){
            return back();
        }
    }
}
