<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sentinel;
use App\User;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users[0]->role->role_name());
        $admin = Sentinel::findRoleByName('Admins');
        return view('protected.admin.list_users')->withUsers($users)->withAdmin($admin);
    }

    //store new users added by admin
    public function store(Request $request)
    {
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
            'first_name' => $request->name,
            'last_name' => $request->surname,
        ];
        //dd($credentials);
        $user=Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleByName($request->role);
        $role->users()->attach($user);

        return redirect('/admin/profiles');
    }
}
