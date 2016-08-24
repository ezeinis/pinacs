<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Sentinel;
use App\User;

class AuthAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

            // Get the submited request data
            $input = $request->all();
            //dd($input);
            // Remember me flag for authentication
            $remember = (bool) array_pull($input, 'remember', false);

            // Authenticate the user
            if (Sentinel::authenticate($input, $remember)) {
                $user = Sentinel::getUser();
                $user = User::find($user->id);
                switch($user->role->role_name()){
                    case "Admins":
                        return redirect()->intended('admin/profiles');
                    case "Users":
                        dd("user");
                    case "Teachers":
                        return redirect()->intended('/teacher');
                }
            }
            dd("not ok");
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect()->route('login_view');
    }
}
