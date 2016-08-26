<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sentinel;
use App\User;
use App\Role;
use App\RoleUser;
use App\Assign;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::with('role','assign.class_year.level_class.level_class')->get();
        //dd($users);
        return view('protected.admin.list_users',compact('users'));
    }

    //store new users added by admin
    public function store(Request $request)
    {
        //dd($request->class_list);
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
            'first_name' => $request->name,
            'last_name' => $request->surname,
        ];
        //dd($credentials);
        $user=Sentinel::registerAndActivate($credentials);
        if($request->class_list!="-"){
            $assign = new Assign;
            $assign->role=$request->role;
            $assign->class_year_id=$request->class_list;
            $assign->user_id=$user->id;
            $assign->save();
        }
        $role = Sentinel::findRoleByName($request->role);
        $role->users()->attach($user);
        $user = User::find($user->id);
        $user->phone = $request->phone;
        $user->save();

        return redirect('/admin/profiles');
    }

    public function filterByRole($role)
    {
        $role=Role::where('slug','students')->first();
        $role_users=RoleUser::where('role_id',$role->id)->get();
        dd($role_users[0]);
        return view('protected.admin.list_users',compact('users'));
    }

    public function delete(Request $request)
    {
        $user = Sentinel::findById($request->id);
        $user->delete();
        return $request->id;
    }

    public function getPassword(Request $request)
    {
        $user = Sentinel::findUserById($request->id);
        return $user->password;
    }
}
