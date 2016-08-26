<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClassYear;

class AdminController extends Controller
{
    public function getHome()
    {
        return view('protected.admin.admin_dashboard');
    }

    public function addUserView($role)
    {
        $classes = ClassYear::with('level_class')->get();
        //dd($classes);
        switch($role){
            case "teacher":
                return view('protected.admin.add_teacher',compact('classes'));
            case "student":
                return view('protected.admin.add_students',compact('classes'));
            case "parent":
                return view('protected.admin.add_parent');
        }
    }
}
