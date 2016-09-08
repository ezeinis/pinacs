@extends('layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/datepicker.css">
@stop

@section('content')
    <form method="POST" action="/teacher/homework/edit" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-xs-2" for="">Starting date</label>
            <div class="input-group date col-xs-4" id="" data-date="{{explode(' ',$homework->start_date)[0]}}" data-date-format="yyyy-mm-dd">
                <input id="starting_date" name="starting_date" class="form-control" data-date-format="yyyy-mm-dd" type="text" readonly="" value="{{explode(' ',$homework->start_date)[0]}}" required>
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="">Due date</label>
            <div class="input-group date col-xs-4" id="" data-date="{{explode(' ',$homework->due_date)[0]}}" data-date-format="yyyy-mm-dd">
                <input id="ending_date" name="ending_date" class="form-control" data-date-format="yyyy-mm-dd" type="text" readonly="" value="{{explode(' ',$homework->due_date)[0]}}" required>
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2">
                    <label class="control-label" for="">State</label>
                </div>
                <div class="col-xs-8">
                    @if($homework->state==='active')
                        <label class="radio-inline"><input type="radio" name="state" value="active" checked>Active</label>
                        <label class="radio-inline"><input type="radio" name="state" value="inactive">Inactive</label>
                    @else
                        <label class="radio-inline"><input type="radio" name="state" value="active">Active</label>
                        <label class="radio-inline"><input type="radio" name="state" value="inactive" checked>Inactive</label>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea name="text">{{$homework['homework']->text}}</textarea>
        </div>
        <div class="form-group">
            <label>Attachments: </label>
            @foreach($homework['homework']['attachments'] as $attachment)
                <a href="/file/download/{{$attachment->id}}">{{$attachment->name}}</a>
                <a href="/teacher/delete/attachment/{{$attachment->id}}"><i style="color:#cd0000;" class="fa fa-times" aria-hidden="true"></i></a>
            @endforeach
        </div>
        <div class="form-group">
            <label>Upload files</label>
            <input type="file" name="file_1" id="file_1">
            <input type="file" name="file_2" id="file_2">
            <input type="file" name="file_3" id="file_3">
            <input type="file" name="file_4" id="file_4">
            <input type="file" name="file_5" id="file_5">
        </div>
        <input type="hidden" name="id" value="{{$homework->id}}">
        <input type="hidden" name="class_index" value="{{$class_index}}">
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
