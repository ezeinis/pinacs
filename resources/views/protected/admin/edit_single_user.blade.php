@extends('layouts.edit_user_layout')

@section('form_action')
/user/edit
@stop

@section('assign_to_class')

<h4>Assign to Class</h4>
<div class="row">
    <div class="col-xs-4">
        <div class="form-group">
            <select name="class_list" form="edit_user_form" class="text-center form-control">
                <option value="-">-</option>
                @foreach($classes as $class)
                    @if($user['classes']->first()==NULL)
                        <option value="{{$class->id}}">{{$class['level_class']->name}} {{$class->school_year}}</option>
                    @else
                    @if($class->level_class_id==$user->classes()->first()->level_class_id)
                        <option value="{{$class->id}}" selected>{{$class['level_class']->name}} {{$class->school_year}}</option>
                    @else
                        <option value="{{$class->id}}">{{$class['level_class']->name}} {{$class->school_year}}</option>
                    @endif
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<input type="hidden" name="user_id" value="{{$user->id}}">
<input type="hidden" name="role" value="{{$user['roles']->first()->name}}">
@if($user['classes']->first()==NULL)
    <input type="hidden" name="class_year_id_before" value="0">
@else
    <input type="hidden" name="class_year_id_before" value="{{$user->classes()->first()->id}}">
@endif

@stop
