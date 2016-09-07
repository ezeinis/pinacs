@extends('layouts.main')

@section('content')
@if(!empty($classes[0]))
    @if(!empty($classes[0]['students']))
        <form method="GET" action="/admin/transfer">
        <div class="row">
            <div class="col-xs-1">
                <h4>Classes</h4>
            </div>
            <div class="col-xs-3">
                <select id="class_selection" class="form-control">
                    @foreach($classes as $class)
                        @if($class_index==$loop->index)
                            <option value="{{$loop->index}}" selected>{{$class['level_class']->name}} {{$class->school_year}}</option>
                        @else
                            <option value="{{$loop->index}}">{{$class['level_class']->name}} {{$class->school_year}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-xs-2">
                <h4>Transfer Many</h4>
            </div>
            <div class="col-xs-3">
               <select id="assign_many_selection" class="form-control">
                    @foreach($classes as $class)
                        <option value="{{$loop->index}}">{{$class['level_class']->name}} {{$class->school_year}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table id="user_table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Transfer To</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes[$class_index]['students'] as $student)
                    <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{$student->last_name}} {{$student->first_name}}</td>
                        <td>
                            <select id="student_{{$student->id}}_transfer_selection" name="student[{{$student->id}}]" class="form-control students_transfer_selection">
                                @foreach($classes as $class)
                                    <option value="{{$loop->index}}">{{$class['level_class']->name}} {{$class->school_year}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-group">
            <div class="col-xs-5 col-xs-offset-7 text-right">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </div>
        </form>
    @else
        <div class="row">
            no students registered
        </div>
    @endif
@else
    <div class="row">
        no classes registered
    </div>
@endif
@stop

@section('js')

    <script type="text/javascript">
        // on change class selection
        $('#class_selection').on('change',function(){
            var val=-1;
            val=$(this).val();
            window.location.href = '/admin/transfer/students/'+val;
        });
        $('#assign_many_selection').on('change',function(){
            var val=-1;
            val=$(this).val();
            console.log(val);
            $(".students_transfer_selection").val(val);
        });
    </script>

@stop
