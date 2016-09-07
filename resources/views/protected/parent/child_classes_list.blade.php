@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <h4>{{$student->first_name}} Classes</h4>
    </div>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Level</th>
          <th>Year</th>
        </tr>
    </thead>
    <tbody>
        @foreach($student['classes'] as $class)
            <tr>
                <td>{{$loop->index}}</td>
                @if(!empty($student['current_class'][0]))
                    @if($class['level_class']->id==$student['current_class'][0]->id)
                        <td><a href="/parent/grades/{{$student->id}}/class/{{$class->id}}">{{$class['level_class']->name}} (current)</a></td>
                    @else
                        <td><a href="/parent/grades/{{$student->id}}/class/{{$class->id}}">{{$class['level_class']->name}}</a></td>
                    @endif
                @else
                    <td><a href="/parent/grades/{{$student->id}}/class/{{$class->id}}">{{$class['level_class']->name}}</a></td>
                @endif
                <td>{{$class['level_class']['level']->name}}</td>
                <td>{{$class->school_year}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
