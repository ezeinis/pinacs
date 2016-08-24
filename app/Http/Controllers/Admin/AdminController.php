<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getHome()
    {
        return view('protected.admin.admin_dashboard');
    }

    public function addUserView($role)
    {
        switch($role){
            case "teacher":
                return view('protected.admin.add_teacher');
            case "student":
                return view('protected.admin.add_students');
            case "parent":
                return view('protected.admin.add_parent');
        }
    }
}
