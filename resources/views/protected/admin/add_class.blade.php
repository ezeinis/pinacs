@extends('layouts.main')

@section('title', 'Add Class')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/datepicker.css">
@stop

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Enter Class details</h3>
    </div>
    <div class="panel-body">
        <form id="new_class_form" method="GET" action="/admin/class/add">
        <div class="form-group col-xs-4">
            <label for="class_name">Name</label>
            <input type="text" class="form-control" id="class_name" name="class_name" required>
        </div>
        <div class="form-group col-xs-4">
            <label for="year">School Year (e.g 2015-2016)</label>
            <input type="text" class="form-control" id="year" name="year" required>
        </div>
        <div class="form-group col-xs-4">
            <label style="display:block" for="level_name">Level</label>
            <select name="level_name" form="new_class_form" class="text-center form-control" required>
            <option value="">-</option>
            @foreach($levels as $level)
            <option value="{{$level->id}}">{{$level->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-xs-4">
            <label class="control-label">Starting Date</label>
            <div class="input-group date" id="" data-date="2015-09-15" data-date-format="yyyy-mm-dd">
                <input id="starting_date" name="starting_date" class="form-control" data-date-format="yyyy-mm-dd" type="text" readonly="" value="2015-06-15" required>
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div class="col-xs-4">
            <label class="control-label">Ending Date</label>
            <div class="input-group date" id="dp3" data-date="2015-06-15" data-date-format="yyyy-mm-dd">
                <input id="ending_date" name="ending_date" class="form-control" type="text" data-date-format="yyyy-mm-dd" readonly="" value="2015-06-15" required>
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div class="col-xs-8">
            <div id="datepicker_alert" class="alert alert-danger hidden" role="alert">The end date can not be less then the start date</div>
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
<script src="/js/bootstrap-datepicker.js"></script>
<script>
    var start_change_counter=0;
    var end_change_counter=0;
    //save and new button
    $('.btn-success').on("click",function(){
        $('#redirect').val("back");
    });
    //cancel button redirect
    $('button[type="reset"]').on("click",function(){
        window.location.href = "/admin/levelsclasses";
    });
    //datepicker
    var starting = $('#starting_date').datepicker()
        .on('changeDate',function(ev){
            start_change_counter++;
            var ending = $('#ending_date').data('datepicker');
            if(start_change_counter>=1 && end_change_counter>=1){
                if(ending['date'].valueOf()<ev['date'].valueOf()){
                    $('#datepicker_alert').removeClass('hidden');
                }else{
                    $('#datepicker_alert').addClass('hidden');
                }
            }
        });
    var ending = $('#ending_date').datepicker()
        .on('changeDate',function(ev){
            end_change_counter++;
            var starting = $('#starting_date').data('datepicker');
            if(start_change_counter>=1 && end_change_counter>=1){
                if(ev['date'].valueOf()<starting['date'].valueOf()){
                    $('#datepicker_alert').removeClass('hidden');
                }else{
                    $('#datepicker_alert').addClass('hidden');
                }
            }
        });

</script>
@stop
