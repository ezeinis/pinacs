@extends('layouts.main')

@section('content')
    <div class="single_profile_container">
        <div class="profile_title">
            <h3>User profile</h3>
        </div>
        <div class="row">
            <div class="col-xs-3 text-center">
                <div class="text-right"><a href="/admin/profile/{{$user->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                <img src="/images/male_ic.png">
                <table class="text-left" align="center">
                    <tr>
                        <td><i class="fa fa-user" aria-hidden="true"></i></td>
                        <td>{{$user->last_name}} {{$user->first_name}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-briefcase" aria-hidden="true"></i></td>
                        <td>{{$user['roles']->first()->name}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-phone" aria-hidden="true"></i></td>
                        <td>{{$user->phone}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-xs-9">

            </div>
        </div>
    </div>
@stop
