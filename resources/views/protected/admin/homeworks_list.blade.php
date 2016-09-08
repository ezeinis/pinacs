@extends('layouts.main')

@section('content')

@if(!empty($current_classes_teached[0]))
<div class="row">
    <div class="col-xs-3">
        <h4>Current classes</h4>
    </div>
    <div class="col-xs-3">
        <select id="class_selection" class="form-control">
            @foreach($current_classes_teached as $class)
                @if($class_index==$loop->index)
                    <option value="{{$loop->index}}" selected>{{$class['level_class']->name}}</option>
                @else
                    <option value="{{$loop->index}}">{{$class['level_class']->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-xs-6 text-right">
        <a href="/admin/homeworks/add/new" class="btn btn-default">Add Homework</a>
    </div>
</div>
<div id="homeworks_container">
    @foreach($current_classes_teached[$class_index]['homeworks'] as $homework)
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
                                    <li><a href="/admin/homework/state/{{$homework->pivot->id}}/inactive">Inactive</a></li>
                                </ul>
                                </div>
                            @else
                                <div class="btn-group">
                                <a class="btn btn-warning">Inactive</a>
                                <a aria-expanded="false" href="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/homework/state/{{$homework->pivot->id}}/active">Active</a></li>
                                </ul>
                                </div>
                            @endif

                        </div>
                        <div class="col-xs-1 text-center">
                            <a href="/admin/homeworks/{{$homework->pivot->id}}/grades"><i class="fa fa-users" data-toggle="tooltip" data-placement="top" title="" data-original-title="Student grades" aria-hidden="true"></i></a>
                            <a href="/admin/homeworks/{{$class_index}}/edit/{{$homework->pivot->id}}"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" aria-hidden="true"></i></a>
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
                <div class="panel-footer">
                    @if(empty($homework['attachments'][0]))
                        Attachments: -
                    @else
                        Attachments:
                        @foreach($homework['attachments'] as $attachment)
                            <a href="/file/download/{{$attachment->id}}">{{$attachment->name}}</a>
                        @endforeach
                    @endif
                </div>
                </div>
            </div>
        </div>
     @endforeach
</div>
@else
    <div class="row">
        No homeworks registered
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
            window.location.href = '/admin/homeworks/'+val;
        });
    </script>

@stop
