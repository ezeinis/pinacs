<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Sentinel;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Sentinel::getUser();

        return view('protected.profile',compact('user'));
    }
}
