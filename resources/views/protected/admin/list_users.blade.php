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
            <li><a href="/admin/profiles/add/teacher">Teacher</a></li>
            <li><a href="/admin/profiles/add/student">Student</a></li>
            <li><a href="/admin/profiles/add/parent">Parent</a></li>
            </ul>
          </div>
        </div>
    </div>
    <table id="user_table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <td class="list_user_filters text-right" colspan="9">
                <form id="filter_users_form" method="GET" action="/admin/profiles/filter">
                <div class="btn-group">
                  <label for="role_filter">Role:</label>
                </div>
                <div class="btn-group">
                  <select class="form-control user_filters" id="role_filter">
                    <option value="all">All</option>
                    @foreach($roles as $role)
                      <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="btn-group">
                  <label for="level_filter">Level:</label>
                </div>
                <div class="btn-group">
                  <select class="form-control user_filters" id="level_filter">
                    <option value="all">All</option>
                    @foreach($levels as $level)
                      <option value="{{$level->name}}">{{$level->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="btn-group">
                  <label for="school_year_filter">School Year:</label>
                </div>
                <div class="btn-group">
                  <select class="form-control user_filters" id="school_year_filter">
                    <option value="all">All</option>
                    @foreach($school_years as $school_year)
                      <option value="{{$school_year->school_year}}">{{$school_year->school_year}}</option>
                    @endforeach
                  </select>
                </div>
                </form>
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
                <td>{{$user['roles']->first()->name}}</td>
                <td><a href="/admin/profiles/{{$user->id}}">{{ $user->last_name }} {{ $user->first_name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                @if($user['classes']->first()!=NULL)
                  <td>{{$user['classes']->first()['level_class']->name}}</td>
                  <td>{{$user['classes']->first()['level_class']['level']->name}}</td>
                  <td>{{$user['classes']->first()->school_year}}</td>
                @else
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                @endif
                <td class="list_users_action_container">
                  <a href="/admin/profiles/{{$user->id}}/edit"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit user" aria-hidden="true"></i></a>
                  <i id="delete_user_{{$user->id}}" class="fa fa-trash delete_user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete user"  aria-hidden="true"></i>
                </td>
             </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('js')

<script>
  $('[data-toggle="tooltip"]').tooltip();

  //filter listeners
  $('.user_filters').on("change",function(){
    var role = $('#role_filter').val();
    var level = $('#level_filter').val();
    var year = $('#school_year_filter').val();
    $.ajax({url: "/admin/profile/filter", type: "GET",data:{"role":role,"level":level,"year":year},success: function(result){
        $('#user_table tbody').empty();
        $.each(result,function(index,value){
          if(!jQuery.isEmptyObject(value['classes'])){
            $('#user_table tbody').append("\
            <tr id='user_row_"+value['id']+"'>\
            <td>"+index+"</td>\
            <td>"+value['roles'][0]['name']+"</td>\
            <td>"+value['last_name']+" "+value['first_name']+"</td>\
            <td>"+value['email']+"</td>\
            <td>"+value['phone']+"</td>\
            <td>"+value['classes'][0]['level_class']['name']+"</td>\
            <td>"+value['classes'][0]['level_class']['level']['name']+"</td>\
            <td>"+value['classes'][0]['school_year']+"</td>\
            <td class='list_users_action_container'><a href='/admin/profile/"+value['id']+"/edit'><i class='fa fa-pencil' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit user' aria-hidden='true'></i></a><i id='delete_user_"+value['id']+"' class='fa fa-trash delete_user' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete user'  aria-hidden='true'></i></td>\
            </tr>");
           }
          else{
            $('#user_table tbody').append("\
            <tr id='user_row_"+value['id']+"'>\
            <td>"+index+"</td>\
            <td>"+value['roles'][0]['name']+"</td>\
            <td>"+value['last_name']+" "+value['first_name']+"</td>\
            <td>"+value['email']+"</td>\
            <td>"+value['phone']+"</td>\
            <td>-</td>\
            <td>-</td>\
            <td>-</td>\
            <td class='list_users_action_container'><a href='/admin/profiles/"+value['id']+"/edit'><i class='fa fa-pencil' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit user' aria-hidden='true'></i></a><i id='delete_user_"+value['id']+"' class='fa fa-trash delete_user' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete user'  aria-hidden='true'></i></td>\
            </tr>");
            console.log(index);
          }
        });
    }});
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
