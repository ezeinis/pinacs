@extends('layouts.main')

@section('title', 'Add Level')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Enter Level details</h3>
    </div>
    <div class="panel-body">
        <form method="GET" action="/admin/level/add">
        <div class="form-group col-xs-4">
            <label for="level_name">Name</label>
            <input type="text" class="form-control" id="level_name" name="level_name">
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
