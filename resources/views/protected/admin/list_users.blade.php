@extends('layouts.main')

@section('title', 'List Users')

@section('content')

    <div class="row flex">
        <div class="col-xs-10">
            <h2>Registered Users</h2>
        </div>
        <div class="col-xs-2">
            <div class="btn-group">
              <a href="#" class="btn btn-default">Add User</a>
              <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/user/add/teacher">Teacher</a></li>
                <li><a href="/user/add/student">Student</a></li>
                <li><a href="/user/add/parent">Parent</a></li>
              </ul>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <th>id</th>
              <th>Role</th>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->role->role_name()}}</td>
                <td><a href="profiles/{{ $user->id }}">{{ $user->email }}</a></td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
             </tr>
            @endforeach

        </tbody>
    </table>

@endsection
