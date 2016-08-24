@extends('layouts.main')

@section('title', 'Add Teacher')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Enter Teacher details</h3>
        </div>
        <form method="GET" action="/user/store">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" id="role" name="role" value="Teachers">
            <div class="form-group">
            <div class="col-xs-3 col-xs-offset-9 text-right">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </form>
    </div>
@stop
