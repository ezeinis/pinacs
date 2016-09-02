@extends('layouts.main')

@section('content')

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
                        <div class="col-xs-6 text-right">
                            <a href="/teacher/homeworks/{{$class_index}}/edit/{{$homework->pivot->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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

@stop

@section('js')

    <script type="text/javascript">
        // on change class selection
        $('#class_selection').on('change',function(){
            var val=-1;
            val=$(this).val();
            window.location.href = '/teacher/homeworks/'+val;
        });
    </script>

@stop
