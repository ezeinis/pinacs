@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <h4>Student Grades</h4>
    </div>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Grade</th>
          <th>Comments</th>
        </tr>
    </thead>
    <form method="GET" action="/teacher/homeworks/grades/store">
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$loop->index}}</td>
                <td>{{$student->last_name}} {{$student->first_name}}</td>
                @if($students_grades)
                    @if(array_key_exists($student->id,$students_grades))
                        <td class="text-center"><input type="number" name="grade[{{$student->id}}]" min="0" max="20" step="0.5" value="{{$students_grades[$student->id]}}"></td>
                    @else
                        <td class="text-center"><input type="number" name="grade[{{$student->id}}]" min="0" max="20" step="0.5" ></td>
                    @endif
                @else
                    <td class="text-center"><input type="number" name="grade[{{$student->id}}]" min="0" max="20" step="0.5" ></td>
                @endif
                @if($students_comments)
                    @if(array_key_exists($student->id,$students_comments))
                        <td><input style="width:100%" type="text" name="comment[{{$student->id}}]" value="{{$students_comments[$student->id]}}"></td>
                    @else
                        <td><input style="width:100%" type="text" name="comment[{{$student->id}}]"></td>
                    @endif
                @else
                <td><input style="width:100%" type="text" name="comment[{{$student->id}}]"></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
<input type="hidden" name="homework_id" value="{{$homework_id}}">
<div class="form-group">
    <div class="col-xs-5 col-xs-offset-7 text-right">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
</form>
@stop
