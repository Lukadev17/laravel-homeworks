@extends('layout.layout')
@section('content')
<div class="d-flex flex-row justify-content-center mt-lg-2">
    <form  method="post" action="{{route('post_login')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Username:</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group" >
            <label for="exampleInputPassword1">Password:</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Password">
        </div>
        <button type="submit" style="margin-left: auto; margin-right: auto; display: block" class="btn btn-primary justify-center">Login</button>
    </form>
</div>
@endsection
