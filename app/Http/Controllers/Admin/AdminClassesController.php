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
        $classes = ClassYear::with('class')->get();
        //echo $classes[0]['class'];
        //dd($classes[0]);
        return view('protected.admin.list_classes',compact('levels','classes'));
    }
}
