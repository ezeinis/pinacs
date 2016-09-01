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
use App\LevelClass;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles','classes.level_class.level')->paginate(5);
        $levels = LevelClass::where('parent',NULL)->get();
        $school_years = ClassYear::groupBy('school_year')->get(['school_year']);
        $roles=Role::get(['name']);
        $filter_role="none";
        $filter_year="none";
        $filter_level="none";
        //dd($users);
        //dd($users[1]['classes']->first()->school_year);
        return view('protected.admin.list_users',compact('users','levels','roles','school_years','filter_role','filter_year','filter_level'));
    }

    //store new users added by admin
    public function store(Request $request)
    {
        // dd($request->roles);
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
            'first_name' => $request->name,
            'last_name' => $request->surname,
        ];
        $user=Sentinel::registerAndActivate($credentials);
        $user = User::find($user->id);
        $user->phone = $request->phone;
        $user->save();
        if($request->roles!=NULL){
            foreach($request->roles as $r){
                $role = Sentinel::findRoleById($r);
                $role->users()->attach($user);
            }
        }
        if($request->classes!=NULL){
            foreach($request->classes as $c){
                $class=ClassYear::find($c);
                $user->classes()->attach($class);
            }
        }
        // if($request->class_list!="-"){
        //     $class=ClassYear::find($request->class_list);
        //     $user->classes()->attach($class);
        // }

        if($request->redirect=="admin"){
            return redirect('/admin/profiles');
        }elseif($request->redirect=="back"){
            return back();
        }
    }

    public function filterUsers(Request $request)
    {
        $inputs = $request->except('_token');
        $defaults = ["role"=>"all","level"=>"all","year"=>"all"];
        $filters=array_merge($defaults,$inputs);
        //dd($filters);
        $users_query = User::with('roles','classes.level_class.level');
        if($filters['role']!='all'){
            $users_query=$users_query->whereHas('roles',function($users_query) use ($filters){
                $users_query->where('name',$filters['role']);
            });
        }
        if($filters['year']!='all'){
            $users_query=$users_query->whereHas('classes',function($users_query) use ($filters){
                $users_query->where('school_year',$filters['year']);
            });
        }
        if($filters['level']!='all'){
            $users_query=$users_query->whereHas('classes',function($users_query) use ($filters){
                $users_query=$users_query->whereHas('level_class',function($users_query) use ($filters){
                    $users_query=$users_query->whereHas('level',function($users_query) use ($filters){
                        $users_query->where('name',$filters['level']);
                    });
                });
            });
        }
        $users = $users_query->get();
        $levels = LevelClass::where('parent',NULL)->get();
        $school_years = ClassYear::groupBy('school_year')->get(['school_year']);
        $roles=Role::get(['name']);

        $filter_role=$request->role;
        $filter_year=$request->year;
        $filter_level=$request->level;

        return view('protected.admin.list_users',compact('users','levels','roles','school_years','filter_role','filter_year','filter_level'));
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
        $user = User::where('id',$id)->with('roles')->get();
        $user = $user[0];
        return view('protected.admin.single_user_profile',compact('user'));
    }

    public function editUserProfile($id)
    {
        $user = User::where('id',$id)->with('roles','classes.level_class.level')->get();
        $user = $user[0];
        $user_roles_array=[];
        foreach($user['roles'] as $role){
            array_push($user_roles_array, $role->id);
        }
        $classes_assigned_array=[];
        //dd($user['classes']);
        foreach($user['classes'] as $class){
            array_push($classes_assigned_array, $class->id);
        }
        //dd($user_roles_array);
        $roles = Role::all();
        $classes = ClassYear::with('level_class')->get();
        //dd($classes);
        return view('protected.admin.edit_single_user',compact('classes','user','roles','user_roles_array','classes_assigned_array'));
    }

    public function edit(Request $request)
    {
        $user = Sentinel::findById($request->user_id);
        $credentials = [
            'email'    => $request->email,
            'first_name' => $request->name,
            'last_name' => $request->surname,
        ];

        $user=Sentinel::update($user,$credentials);
        $user = User::find($user->id);
        $user->phone = $request->phone;
        $user->save();
        if($request->classes!=NULL){
            foreach($request->classes as $c){
                $class=ClassYear::find($c);
                $assign=Assign::where('class_year_id',$class->id)->where('user_id',$user->id)->get();
                if($assign->first()==null){
                    $user->classes()->attach($class);
                }
            }
        }
        if($request->roles!=NULL){
            foreach($request->roles as $r){
                $role=Role::find($r);
                $role_user=RoleUser::where('role_id',$role->id)->where('user_id',$user->id)->get();
                if($role_user->first()==null){
                    $role->users()->attach($user);
                }
            }
        }
        // if($request->class_year_id_before!=0 && $request->class_list!=$request->class_year_id_before){
        //     $assign=Assign::where('class_year_id',$request->class_year_id_before)->where('user_id',$user->id)->get();
        //     $assign[0]->class_year_id=$request->class_list;
        //     $assign[0]->save();
        // }
        // if($request->class_year_id_before==0 && $request->class_list!='-'){
        //     $class=ClassYear::find($request->class_list);
        //     $user->classes()->attach($class);
        // }

        return redirect('/admin/profiles');
    }
}
