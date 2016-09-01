@extends('layouts.main')

@section('title', 'List Users')

@section('content')


    <h2>Levels and Classes</h2>
    <div class="row flex">
        <div class="col-xs-10">
            <h4>Levels</h4>
        </div>
        <div class="col-xs-2 text-right">
          <div class="btn-group">
            <a href="/admin/levelsclasses/level" class="btn btn-default">Add Level</a>
          </div>
        </div>
    </div>
    <!-- levels table -->
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Students</th>
              <th>Teachers</th>
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($levels as $level)
        <tr>
          <td>{{$loop->index}}</td>
          <td>{{$level->name}}</td>
          <td>{{$levels_tea_st_numbers[$level->id]['Students']}}</td>
          <td>{{$levels_tea_st_numbers[$level->id]['Teachers']}}</td>
          <td class="list_users_action_container">
            <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit user" aria-hidden="true"></i>
            <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete user"  aria-hidden="true"></i>
          </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row flex">
        <div class="col-xs-10">
            <h4>Classes</h4>
        </div>
        <div class="col-xs-2 text-right">
          <div class="btn-group">
            <a href="/admin/levelsclasses/class" class="btn btn-default">Add Class</a>
          </div>
        </div>
    </div>
    <!-- classes table -->
    <table id="classes_table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <td class="list_user_filters text-right" colspan="9">
                <form id="filter_classes_form" method="GET" action="/admin/classes/filter">
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
                </form>
              </td>
            </tr>
        </thead>
        <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Level</th>
              <th>Scholl Year</th>
              <th>Students</th>
              <th>Teachers</th>
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=0; ?>
        @foreach($levels as $level)
          @foreach($level['level_classes'] as $class)
            @foreach ($class['classes'] as $class2)
            <tr>
              <td>{{$i}}</td>
              <td>{{$class->name}}</td>
              <td>{{$level->name}}</td>
              <td>{{$class2->school_year}}</td>
              <td><a href="/admin/class/{{$class2->id}}/students">{{count($class2['students'])}}</a></td>
              <td><a href="/admin/class/{{$class2->id}}/teachers">{{count($class2['teachers'])}}</a></td>
              <td class="list_users_action_container">
                <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit user" aria-hidden="true"></i>
                <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete user"  aria-hidden="true"></i>
              </td>
            </tr>
            <?php $i++; ?>
            @endforeach
          @endforeach
        @endforeach
        </tbody>
    </table>

@endsection

@section('js')

<script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
  });

  //filter listeners
  $('.user_filters').on("change",function(){
    var level_filter = $('#level_filter').val();
    var year = $('#school_year_filter').val();
    $.ajax({url: "/admin/classes/filter", type: "GET",data:{"level":level_filter},success: function(result){
        $('#classes_table tbody').empty();
        if(level_filter=="all"){
          var step=0;
          $.each(result,function(index,value){
            var level = value['name'];
            $.each(value['level_classes'],function(index2,value2){
              $('#classes_table tbody').append("<tr>\
                <td>"+step+"</td>\
                <td>"+value2['name']+"</td>\
                <td>"+level+"</td>\
                <td>"+value2['classes'][0]['school_year']+"</td>\
                <td>"+value2['classes'][0]['students'].length+"</td>\
                <td>"+value2['classes'][0]['teachers'].length+"</td>\
                <td class='list_users_action_container'>\
                <i class='fa fa-pencil' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit user' aria-hidden='true'></i>\
                <i class='fa fa-trash' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete user' aria-hidden='true'></i>\
              </td>\
              </tr>");
              step++;
            });
          });
        }else{
          var level = result[0]['name'];
          $.each(result[0]['level_classes'],function(index,value){
            $('#classes_table tbody').append("<tr>\
            <td>"+index+"</td>\
            <td>"+value['name']+"</td>\
            <td>"+level+"</td>\
            <td>"+value['classes'][0]['school_year']+"</td>\
            <td>"+value['classes'][0]['students'].length+"</td>\
            <td>"+value['classes'][0]['teachers'].length+"</td>\
            <td class='list_users_action_container'>\
                <i class='fa fa-pencil' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit user' aria-hidden='true'></i>\
                <i class='fa fa-trash' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete user' aria-hidden='true'></i>\
              </td>\
            </tr>");
          });
        }
      }});
    });
</script>

@endsection
