@extends('layouts.appAdmin')
@section('contentAdmin')
    <table class = "table table-border">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Date of Birth</th>
            <th>Gender</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->dob}}</td>
            <td>{{$user->gender}}</td>
            <td><a href="/editUser/{{$user->name}}">Edit</a></td>
            <td><a href="/deleteUser/{{$user->name}}">Delete</a></td>
        </tr>
        @endforeach
@endsection