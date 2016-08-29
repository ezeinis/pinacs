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
use App\ClassYear;

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

        if($request->redirect=="admin"){
            return redirect('/admin/profiles');
        }elseif($request->redirect=="back"){
            return back();
        }

    }

    public function filterByRole($role)
    {
        $role_users = Role::where('slug',$role)->with('role_user.user')->get();
        $target_users = [];
        foreach($role_users[0]['role_user'] as $role_user){
            array_push($target_users, $role_user['user']->id);
        }
        $users = User::with('role','assign.class_year.level_class.level_class')->whereIn('id',$target_users)->get();

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

    public function singleUserProfile($id)
    {
        $user = User::where('id',$id)->get();
        $user = $user[0];
        return view('protected.single_user_profile',compact('user'));
    }

    public function editUserProfile($id)
    {
        $user = User::where('id',$id)->get();
        $user = $user[0];
        $classes = ClassYear::with('level_class')->get();
        return view('protected.edit',compact('classes','user'));
    }

    public function edit(Request $request)
    {
        $user = Sentinel::findById($request->user_id);
        $credentials = [
            'email'    => $request->email,
            'first_name' => $request->name,
            'last_name' => $request->surname,
        ];
        //dd($credentials);
        $user=Sentinel::update($user,$credentials);
        //dd($request->class_year_id_before);

        if($request->class_year_id_before!=0 && $request->class_list!=$request->class_year_id_before){
            $assign=Assign::where('user_id',$user->id)->where('class_year_id',$request->class_year_id_before)->get();
            $assign[0]->class_year_id=$request->class_list;
            $assign[0]->save();
        }
        if($request->class_year_id_before==0 && $request->class_list!='-'){
            $assign = new Assign;
            $assign->role=$request->role;
            $assign->class_year_id=$request->class_list;
            $assign->user_id=$user->id;
            $assign->save();
        }

        $user = User::find($user->id);
        $user->phone = $request->phone;
        $user->save();

        return back();
    }
}
