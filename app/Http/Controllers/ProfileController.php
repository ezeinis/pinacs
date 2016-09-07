<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Sentinel;
use App\ClassYear;
use App\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Sentinel::getUser();
        $user=User::find($user->id);
        //dd($user->child);
        return view('protected.user.single_user_profile',compact('user'));
    }

    public function editProfileView()
    {
        $user = Sentinel::getUser();
        $user = User::where('id',$user->id)->with('roles')->get();
        $user = $user[0];

        $classes = ClassYear::with('level_class')->get();
        //dd($classes);
        return view('protected.user.single_user_profile_edit',compact('classes','user'));
    }

    public function editProfile(Request $request)
    {
        $user = Sentinel::getUser();
        $user = User::find($user->id);
        $user->email=$request->email;
        $user->first_name=$request->name;
        $user->last_name=$request->surname;
        $user->phone=$request->phone;
        $user->save();
        return redirect('/profile');
    }
}
