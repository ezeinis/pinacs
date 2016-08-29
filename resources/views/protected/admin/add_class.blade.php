@extends('layouts.main')

@section('title', 'Add Class')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Enter Class details</h3>
    </div>
    <div class="panel-body">
        <form id="new_class_form" method="GET" action="/admin/class/add">
        <div class="form-group col-xs-4">
            <label for="class_name">Name</label>
            <input type="text" class="form-control" id="class_name" name="class_name">
        </div>
        <div class="form-group col-xs-4">
            <label for="year">Year</label>
            <input type="text" class="form-control" id="year" name="year">
        </div>
        <div class="form-group col-xs-4">
            <label style="display:block" for="level_name">Level</label>
            <select name="level_name" form="new_class_form" class="text-center">
            <option value="-">-</option>
            @foreach($levels as $level)
            <option value="{{$level->id}}">{{$level->name}}</option>
            @endforeach
            </select>
        </div>
        <input type="hidden" class="form-control" id="redirect" name="redirect" value="admin">
        <div class="form-group">
            <div class="col-xs-5 col-xs-offset-7 text-right">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="submit" class="btn btn-success">Save & New</button>
            </div>
        </div>
        </form>
    </div>
</div>
@stop

@section('js')
<script>
    //save and new button
    $('.btn-success').on("click",function(){
        $('#redirect').val("back");
    });
    //cancel button redirect
    $('button[type="reset"]').on("click",function(){
        window.location.href = "/admin/classes";
    });
</script>
@stop
