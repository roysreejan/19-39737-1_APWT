@extends('layouts.app')
@section('content')
<div class="container" style="width:500px;"> 
<h2>Log in</h2> 
    <form action="{{route('login')}}" method="post">
        {{@csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group p-1">
            <span>
                <input type="submit" name="submit" value="Login" class="btn btn-info">
            </span>
        </div>
    </form>
</div>
@endsection