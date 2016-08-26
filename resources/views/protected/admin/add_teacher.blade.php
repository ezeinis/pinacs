@extends('layouts.main')

@section('title', 'Add Teacher')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Enter Teacher details</h3>
        </div>
        <form id="new_user_form" method="GET" action="/user/store">
        <div class="panel-body">
            <h4>Personal Info</h4>
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                </div>
                <h4>Login Info</h4>
                <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <i class="fa fa-eye show-pass" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show password" aria-hidden="true"></i>
                        <a class="btn btn-default generate-password-btn">Generate</a>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <i class="fa fa-eye show-confirm-pass" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show password" aria-hidden="true"></i>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </div>
            </div>
            <h4>Assign to Class</h4>
                <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <select name="class_list" form="new_user_form" class="text-center">
                        <option value="-">-</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class['class']->name}} {{$class->school_year}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" id="role" name="role" value="Teachers">
            <div class="form-group">
            <div class="col-xs-3 col-xs-offset-9 text-right">
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

  //generate password
  $('.generate-password-btn').on("click",function(){
    onoma = $('#name').val();
    epitheto = $('#surname').val();
    if(onoma=="" || epitheto==""){
        alert("balte onoma kai epitheto")
    }else{
        var pass = document.getElementById('password');
        pass.type = 'text';
        var confirm_pass = document.getElementById('confirm_password');
        confirm_pass.type = 'text';
        $('#password').val(onoma+epitheto);
        $('#confirm_password').val(onoma+epitheto);
    }
  });

  //show password
  $('.show-pass').on("click",function(){
    var pass = document.getElementById('password');
    toggle(pass);
  });

  //show confirm password
  $('.show-confirm-pass').on("click",function(){
    var confirm_pass = document.getElementById('confirm_password');
    toggle(confirm_pass);
  });

//match passwords
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");
    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    //functions
    function toggle(toggle_item){
        if(toggle_item.type=="text")toggle_item.type="password";
        else toggle_item.type="text";
    }
</script>

@stop
