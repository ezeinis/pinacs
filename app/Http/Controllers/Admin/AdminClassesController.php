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
        $levels = LevelClass::where('parent',NULL)->get();
        $classes = ClassYear::with('class','students','teachers')->get();
        //echo $classes[0]['class'];
        //dd($classes[0]);

        //sunolo teacher students gia levels
        foreach($classes as $class){
            $levels_tea_st_numbers[$class['class']->parent]['Students']=0;
            $levels_tea_st_numbers[$class['class']->parent]['Teachers']=0;
        }
        foreach($classes as $class){
            $levels_tea_st_numbers[$class['class']->parent]['Students']+=count($class['students']);
            $levels_tea_st_numbers[$class['class']->parent]['Teachers']+=count($class['teachers']);
        }
        //dd($levels_tea_st_numbers);

        return view('protected.admin.list_classes',compact('levels','classes','levels_tea_st_numbers'));
    }
}
