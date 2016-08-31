@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <h4>{{$class_name}} students</h4>
    </div>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$loop->index}}</td>
                <td>{{$student->last_name}} {{$student->first_name}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->email}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
