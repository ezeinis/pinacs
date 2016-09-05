@extends('layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/datepicker.css">
@stop

@section('content')
    <div style="margin-bottom:20px;" class="row">
        <div class="col-xs-12">
            <h4>New Homework</h4>
        </div>
    </div>
    <form method="GET" action="/teacher/homework/add">
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2">
                    <label for="class" class="">Class</label>
                </div>
                <div class="col-xs-4">
                    <select name="class" id="class_selection" class="form-control">
                    @foreach($current_classes_teaching as $class)
                        <option value="{{$class->id}}">{{$class['level_class']->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2">
                    <label class="control-label" for="">Starting date</label>
                </div>
                <div class="col-xs-4">
                    <div class="input-group date" id="" data-date="2016-09-15" data-date-format="yyyy-mm-dd">
                    <input id="starting_date" name="starting_date" class="form-control" data-date-format="yyyy-mm-dd" type="text" readonly="" value="2016-09-15" required>
                    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2">
                    <label class="control-label" for="">Ending date</label>
                </div>
                <div class="col-xs-4">
                    <div class="input-group date" id="" data-date="2016-09-15" data-date-format="yyyy-mm-dd">
                    <input id="ending_date" name="ending_date" class="form-control" data-date-format="yyyy-mm-dd" type="text" readonly="" value="2016-09-15" required>
                    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2">
                    <label class="control-label" for="">State</label>
                </div>
                <div class="col-xs-8">
                    <label class="radio-inline"><input type="radio" name="state" value="active" checked>Active</label>
                    <label class="radio-inline"><input type="radio" name="state" value="inactive">Inactive</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea name="text"></textarea>
        </div>
        <div class="form-group">
            <div class="col-xs-5 col-xs-offset-7 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>

@stop

@section('js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
        content_css : '/css/content.css',
        height : "400",
        selector:'textarea',
        plugins: "textcolor",
        toolbar: ['bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, fontselect, fontsizeselect, bullist, numlist,  undo, redo,forecolor backcolor']
    });
    </script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        var starting = $('#starting_date').datepicker();
        var ending = $('#ending_date').datepicker();
    </script>
@stop
