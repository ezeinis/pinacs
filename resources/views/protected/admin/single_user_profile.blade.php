@extends('layouts.single_user_profile_layout')

@section('profile_redirect')
/admin/profiles/{{$user->id}}/edit
@stop
