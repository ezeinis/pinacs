@extends('layouts.main')

@section('title', 'List Users')

@section('content')

    <div class="row flex">
        <div class="col-xs-10">
            <h2>Registered Users</h2>
        </div>
        <div class="col-xs-2 text-right">
          <div class="btn-group">
            <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Add User
            <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="/admin/add/teacher">Teacher</a></li>
            <li><a href="/admin/add/student">Student</a></li>
            <li><a href="/admin/add/parent">Parent</a></li>
            </ul>
          </div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <td class="list_user_filters text-right" colspan="9">
                <!-- filter role -->
                <div class="btn-group">
                  <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  Role
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="/admin/profiles">All <i class="fa fa-check" aria-hidden="true"></i></a></li>
                    <li><a href="/admin/profiles/admins">Admins</a></li>
                    <li><a href="/admin/profiles/teachers">Teachers</a></li>
                    <li><a href="/admin/profiles/students">Students</a></li>
                    <li><a href="/admin/profiles/parents">Parents</a></li>
                  </ul>
                </div>
                <!-- filter role end-->
                <!-- filter level -->
                <div class="btn-group">
                  <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  Level
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="/admin/profiles">All <i class="fa fa-check" aria-hidden="true"></i></a></li>
                    <li><a href="/admin/profiles/admins">Pro Junior</a></li>
                    <li><a href="/admin/profiles/teachers">Junior</a></li>
                    <li><a href="/admin/profiles/students">Senior</a></li>
                  </ul>
                </div>
                <!-- filter level end-->
                <!-- filter year -->
                <div class="btn-group">
                  <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  Year
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="/admin/profiles">All <i class="fa fa-check" aria-hidden="true"></i></a></li>
                    <li><a href="/admin/profiles/admins">2014-2015</a></li>
                    <li><a href="/admin/profiles/teachers">2015-2016</a></li>
                    <li><a href="/admin/profiles/students">2016-2017</a></li>
                  </ul>
                </div>
                <!-- filter year end-->
              </td>
            </tr>
        </thead>
        <thead>
            <tr>
              <th>#</th>
              <th>Role</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Class</th>
              <th>Level</th>
              <th>School Year</th>
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr id="user_row_{{$user->id}}">
                <td>{{ $loop->index }}</td>
                <td>{{ $user['role']->role_name()}}</td>
                <td><a href="/admin/profile/{{$user->id}}">{{ $user->last_name }} {{ $user->first_name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                @if($user['assign']!=NULL)
                  <td>{{$user['assign']['class_year']['level_class']->name}}</td>
                  <td>{{$user['assign']['class_year']['level_class']['level_class']->name}}</td>
                  <td>{{$user['assign']['class_year']->school_year}}</td>
                @else
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                @endif
                <td class="list_users_action_container">
                  <a href="/admin/profile/{{$user->id}}/edit"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit user" aria-hidden="true"></i></a>
                  <i id="delete_user_{{$user->id}}" class="fa fa-trash delete_user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete user"  aria-hidden="true"></i>
                </td>
             </tr>
            @endforeach

        </tbody>
    </table>

@endsection

@section('js')

<script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
  });
  //delete user ajax call
  $('.delete_user').on("click",function(){
    var user_id_to_delete = $(this).attr('id');
    var id = user_id_to_delete.split("_")[2];
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this user!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){
      $('#user_row_'+id).remove();
      $.ajax({url: "/admin/delete/user", type: "GET",data:{"id":id},success: function(result){

      }});
      swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });

  });
</script>

@endsection
