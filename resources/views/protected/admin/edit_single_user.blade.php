@extends('layouts.main')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/select2.min.css">
@stop

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Enter user details</h3>
        </div>
        <form id="edit_user_form" autocomplete="on" method="GET" action="/user/edit">
        <div class="panel-body">
            <h4>Personal Info</h4>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->first_name}}">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="{{$user->last_name}}">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                    </div>
                </div>
                </div>
                <h4>Login Info</h4>
                <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"  value="{{$user->email}}" required autocomplete="off">
                    </div>
                </div>
            </div>
<div class="row">
    <div class="col-xs-4">
        <h4>Assign To Class</h4>
        <div class="form-group">
            @foreach($classes as $class)
                <div class="checkbox">
                    @if(in_array($class->id,$classes_assigned_array))
                        <label><input type="checkbox" name="classes[]" value="{{$class->id}}" checked>{{$class['level_class']->name}} {{$class->school_year}}</label>
                    @else
                        <label><input type="checkbox" name="classes[]" value="{{$class->id}}">{{$class['level_class']->name}} {{$class->school_year}}</label>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-xs-4">
        <h4>Role</h4>
        <div id="role_checkbox" class="form-group">
            @foreach($roles as $role)
                <div class="checkbox">
                    @if(in_array($role->name,$user_roles_array))
                        <label><input data-role="{{$role->name}}" type="checkbox" name="roles[]" value="{{$role->id}}" checked>{{$role->name}}</label>
                    @else
                        <label><input data-role="{{$role->name}}" type="checkbox" name="roles[]" value="{{$role->id}}">{{$role->name}}</label>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <div id="parent_to_col" class="col-xs-4 <?php if($child_id==0)echo 'hidden'; ?>">
        <h4>Parent To Student</h4>
        <select name="parent_selection[]" class="parent-to-selection" multiple="multiple">
            @foreach($users as $user)
                @if($user->id==$child_id)
                    <option value="{{$user->id}}" selected>{{$user->last_name}} {{$user->first_name}}</option>
                @else
                    <option value="{{$user->id}}">{{$user->last_name}} {{$user->first_name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    </div>
<div class="form-group">
            <div class="col-xs-5 col-xs-offset-7 text-right">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </form>
    </div>
@stop

@section('js')
    <script src="/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $(".parent-to-selection").select2();
        });
        //on role parent select
        $('#role_checkbox input').on('change',function(){
            var val = $(this).attr("data-role");
            console.log(val);
            if(val=="Parents"){
                if($(this).is(':checked')){
                    $('#parent_to_col').removeClass('hidden');
                }else{
                    $('#parent_to_col').addClass('hidden');
                }
            }
            // console.log(val);
        });
    </script>
@stop
