@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <h4>Homeworks {{$current_class->name}}</h4>
    </div>
</div>
<div id="homeworks_container">
    @foreach($homeworks as $homework)
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{$homework->text}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@stop
