@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <h4>My Classes</h4>
    </div>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Level</th>
          <th>Year</th>
          <th>Students</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user['classes'] as $class)
        <tr>
            <td>{{$loop->index}}</td>
            <td>{{$class['level_class']->name}}</td>
            <td>{{$class['level_class']['level']->name}}</td>
            <td>{{$class->school_year}}</td>
            <td><a href="/teacher/class/{{$class->id}}/students">{{count($class['students'])}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
