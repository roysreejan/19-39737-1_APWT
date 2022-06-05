@extends('layouts.app')
@section('content')
<h1> Product </h1>
<table class="table table-border">
    @foreach($product as $product)
    <tr>
        <td>{{$product}}</td>
    </tr>
    @endforeach
@endsection