<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ParentController extends Controller
{
    public function getHome()
    {
        return view('protected.parent.parent_dashboard');
    }
}
