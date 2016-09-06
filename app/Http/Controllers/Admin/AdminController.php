<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClassYear;
use App\Role;
use App\User;

class AdminController extends Controller
{
    public function getHome()
    {
        return view('protected.admin.admin_dashboard');
    }

    public function addUserView()
    {
        $users=User::all();
        $classes = ClassYear::with('level_class')->get();
        $roles = Role::all();
        return view('protected.admin.add_user',compact('users','classes','roles'));
    }
}
