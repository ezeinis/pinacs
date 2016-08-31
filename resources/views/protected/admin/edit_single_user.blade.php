@extends('layouts.edit_user_layout')

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
        <div class="form-group">
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
</div>
<input type="hidden" name="user_id" value="{{$user->id}}">

@stop
