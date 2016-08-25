<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sentinel;
use App\User;
use App\Role;
use App\RoleUser;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users[0]->role->role_name());
        return view('protected.admin.list_users',compact('users'));
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

    public function filterByRole($role)
    {
        $role=Role::where('slug','students')->first();
        $role_users=RoleUser::where('role_id',$role->id)->get();
        dd($role_users[0]);
        return view('protected.admin.list_users',compact('users'));
    }
}
