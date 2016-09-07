@extends('layouts.main')

@section('content')

@if($homeworks_for_first_class!=null)
<div class="row">
    <div class="col-xs-3">
        <h4>Current classes</h4>
    </div>
    <div class="col-xs-3">
        <select id="class_selection" class="form-control">
            @foreach($current_classes_teaching as $class)
                @if($class_index==$loop->index)
                    <option value="{{$loop->index}}" selected>{{$class['level_class']->name}}</option>
                @else
                    <option value="{{$loop->index}}">{{$class['level_class']->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-xs-6 text-right">
        <a href="/teacher/homeworks/add/new" class="btn btn-default">Add Homework</a>
    </div>
</div>
<div id="homeworks_container">
    @foreach($homeworks_for_first_class as $homework)
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2 no-padding-right">
                            Created at: {{explode(' ',$homework->created_at)[0]}}
                        </div>
                        <div class="col-xs-2">
                            Start date: {{explode(' ',$homework->pivot->start_date)[0]}}
                        </div>
                        <div class="col-xs-2">
                            Due date: {{explode(' ',$homework->pivot->due_date)[0]}}
                        </div>
                        <div class="col-xs-3">

                        </div>
                        <div class="col-xs-2 text-right">
                            @if($homework->pivot->state==='active')
                                <div class="btn-group">
                                <a class="btn btn-success">Active</a>
                                <a aria-expanded="false" href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/teacher/homework/state/{{$homework->pivot->id}}/inactive">Inactive</a></li>
                                </ul>
                                </div>
                            @else
                                <div class="btn-group">
                                <a class="btn btn-warning">Inactive</a>
                                <a aria-expanded="false" href="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/teacher/homework/state/{{$homework->pivot->id}}/active">Active</a></li>
                                </ul>
                                </div>
                            @endif

                        </div>
                        <div class="col-xs-1 text-center">
                            <a href="/teacher/homeworks/{{$homework->pivot->id}}/grades"><i class="fa fa-users" data-toggle="tooltip" data-placement="top" title="" data-original-title="Student grades" aria-hidden="true"></i></a>
                            <a href="/teacher/homeworks/{{$class_index}}/edit/{{$homework->pivot->id}}"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" aria-hidden="true"></i></a>
                            <a href=""><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            {!! $homework->text !!}
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
     @endforeach
</div>
@else
    <div class="row">
        Currently you are not teaching at any class
    </div>
@endif
@stop

@section('js')

    <script type="text/javascript">
        $('[data-toggle="tooltip"]').tooltip();
        // on change class selection
        $('#class_selection').on('change',function(){
            var val=-1;
            val=$(this).val();
            window.location.href = '/teacher/homeworks/'+val;
        });
    </script>

@stop
