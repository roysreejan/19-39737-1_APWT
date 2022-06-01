@extends('layouts.app')
@section('content')
<center>
    <?php
        foreach ($data as $item) {
            echo $item;
            echo "<br>";
        };
    ?>
</center>
@endsection