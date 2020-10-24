@extends('user_layout')
@section('content')
<div class="container">
    <div class="row align-items-start bg-danger">
        <div class="col">
            One of one columns
        </div>
        <div class="col">
            One of two columns
        </div>
    </div>
    <div class="row align-items-center bg-dark">
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>
    <div class="row align-items-end bg-info">
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>
</div>


@endsection