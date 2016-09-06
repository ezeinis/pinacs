@extends('layouts.edit_user_layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/select2.min.css">
@stop

@section('form_action')
/user/edit
@stop

@section('assign_to_class')

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
                    @if(in_array($role->id,$user_roles_array))
                        <label><input type="checkbox" name="roles[]" value="{{$role->id}}" checked>{{$role->name}}</label>
                    @else
                        <label><input type="checkbox" name="roles[]" value="{{$role->id}}">{{$role->name}}</label>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
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
<input type="hidden" name="user_id" value="{{$user->id}}">

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
            var val = $(this).val();
            console.log(val);
            if(val==4){
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
