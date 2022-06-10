@extends('layouts.app')
@section('content')
<div class="container" style="width:500px;">
<h2>Contact</h2> 
    <form action="{{ route('contact') }}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone No.</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no.">
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            @error('message')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group p-1">
            <span>
                <input type="submit" name="submit" value="Send" class="btn btn-info">
            </span>
        </div>
    </form>
</div>
@endsection