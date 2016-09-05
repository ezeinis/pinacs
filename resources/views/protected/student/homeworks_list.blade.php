@extends('layouts.main')

@section('content')

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
                                    Grade: -
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            {!! $homework->text !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

@stop
