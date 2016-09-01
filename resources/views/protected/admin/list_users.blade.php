@extends('layouts.main')

@section('title', 'List Users')

@section('content')

    <div class="row flex">
        <div class="col-xs-10">
            <h2>Registered Users</h2>
        </div>
        <div class="col-xs-2 text-right">
          <div class="btn-group">
          <a href="/admin/profiles/user/add" class="btn btn-default">Add User</a>
          </div>
        </div>
    </div>
    <table id="user_table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <td class="list_user_filters text-right" colspan="9">
                <form id="filter_users_form" method="GET" action="/admin/profile/filter">
                <div class="btn-group">
                  <label for="role_filter">Role:</label>
                </div>
                <div class="btn-group">
                  <select name="role" class="form-control user_filters" id="role_filter">
                    @if($filter_role==='all')
                        <option value="all" selected>All</option>
                    @else
                        <option value="all">All</option>
                    @endif
                    @foreach($roles as $role)
                      @if($role->name===$filter_role)
                        <option value="{{$role->name}}" selected>{{$role->name}}</option>
                      @else
                        <option value="{{$role->name}}">{{$role->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="btn-group">
                  <label for="level_filter">Level:</label>
                </div>
                <div class="btn-group">
                  <select name="level" class="form-control user_filters" id="level_filter">
                    @if($filter_level==='all')
                        <option value="all" selected>All</option>
                    @else
                        <option value="all">All</option>
                    @endif
                    @foreach($levels as $level)
                      @if($level->name===$filter_level)
                        <option value="{{$level->name}}" selected>{{$level->name}}</option>
                      @else
                        <option value="{{$level->name}}">{{$level->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="btn-group">
                  <label for="school_year_filter">School Year:</label>
                </div>
                <div class="btn-group">
                  <select name="year" class="form-control user_filters" id="school_year_filter">
                    @if($filter_year==='all')
                        <option value="all" selected>All</option>
                    @else
                        <option value="all">All</option>
                    @endif
                    @foreach($school_years as $school_year)
                      @if($school_year->school_year===$filter_year)
                        <option value="{{$school_year->school_year}}" selected>{{$school_year->school_year}}</option>
                      @else
                        <option value="{{$school_year->school_year}}">{{$school_year->school_year}}</option>
                      @endif
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
                @if($filter_role==='none' && $filter_level==='none' && $filter_year==='none')
                  <td>{{ $loop->index+($users->currentPage()-1)*5 }}</td>
                @else
                  <td>{{ $loop->index }}</td>
                @endif
                <td>{{$user['roles']->first()->name}}</td>
                <td><a href="/admin/profiles/{{$user->id}}">{{ $user->last_name }} {{ $user->first_name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                @if($user['classes']->first()!=NULL)
                  <td>{{$user['classes']->first()['level_class']->name}}
                      @foreach($user['classes'] as $class)
                        @if($loop->index>=1)
                        <hr>{{$class['level_class']->name}}
                        @endif
                      @endforeach
                  </td>
                  <td>{{$user['classes']->first()['level_class']['level']->name}}
                      @foreach($user['classes'] as $class)
                        @if($loop->index>=1)
                        <hr>{{$class['level_class']['level']->name}}
                        @endif
                      @endforeach
                  </td>
                  <td>{{$user['classes']->first()->school_year}}
                      @foreach($user['classes'] as $class)
                        @if($loop->index>=1)
                        <hr>{{$class->school_year}}
                        @endif
                      @endforeach
                  </td>
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
    @if($filter_role==='none' && $filter_level==='none' && $filter_year==='none')
      {{ $users->links() }}
    @else
      {{ $users->appends(['role'=>$filter_role,'level'=>$filter_level,'year'=>$filter_year])->links() }}
    @endif

@endsection

@section('js')

<script>
  $('[data-toggle="tooltip"]').tooltip();

  //filter listeners
  $('.user_filters').on("change",function(){
    $('#filter_users_form').submit();
  });
  //delete user ajax call
  $('#user_table').on("click",".delete_user",function(){
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
