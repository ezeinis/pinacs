@extends('layouts.main')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Enter @yield('panel_title') details</h3>
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
            <h4>Assign to Class</h4>
                <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <select name="class_list" form="edit_user_form" class="text-center">
                        <option value="-">-</option>
                        @foreach($classes as $class)
                        @if($user->assign==NULL)
                            <option value="{{$class->id}}">{{$class['level_class']->name}} {{$class->school_year}}</option>
                        @else
                            @if($class->id==$user->assign->class_year_id)
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
            <input type="hidden" name="role" value="{{$user['role']->role_name()}}">
            @if($user->assign==NULL)
                <input type="hidden" name="class_year_id_before" value="0">
            @else
                <input type="hidden" name="class_year_id_before" value="{{$user->assign->class_year_id}}">
            @endif
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

<script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
  });
  //cancel button redirect
  $('button[type="reset"]').on("click",function(){
        window.location.href = "/admin/profiles";
  });
</script>

@stop

