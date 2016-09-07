@extends('layouts.main')

@section('content')

@if($homeworks!=null)
<div class="row">
    <div class="col-xs-12">
        <h4>Homeworks {{$current_class->name}}</h4>
    </div>
</div>
<div id="homeworks_container">
    @foreach($homeworks as $homework)
        @if($homework->pivot->state==='active')
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    Start date: {{explode(' ',$homework->pivot->start_date)[0]}}
                                </div>
                                <div class="col-xs-2">
                                    Due date: {{explode(' ',$homework->pivot->due_date)[0]}}
                                </div>
                                <div class="col-xs-2 col-xs-offset-6 text-right">
                                    @if($grades)
                                        @if(array_key_exists($homework->pivot->homework_id,$grades))
                                            Grade: {{$grades[$homework->id]}}
                                        @else
                                            Grade: -
                                        @endif
                                    @else
                                        Grade: -
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            {!! $homework->text !!}
                        </div>
                        @if($comments)
                            @if(array_key_exists($homework->pivot->homework_id,$comments))
                                @if($comments[$homework->id])
                                    <div class="panel-footer">
                                        Comments: {{$comments[$homework->id]}}
                                    </div>
                                @else
                                    <div class="panel-footer">
                                        Comments: -
                                    </div>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
@else
    <div class="row">
        No homeworks
    </div>
@endif

@stop
