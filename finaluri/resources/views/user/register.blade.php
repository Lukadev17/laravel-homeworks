@extends('layout.layout')
@section('content')
    <div class="d-flex flex-row justify-content-center mt-lg-2">
        <form method="post" action="{{route('post_register')}}">
            @csrf
            <h1>Register</h1>
            <div class="form-group">
                <label for="name">Username</label><br>
                <input class="form-control" type="text" id="name" name="name" placeholder="Enter USer"><br>
            </div>
            <div class="form-group">
                <label for="email">Email</label><br>
                <input class="form-control" type="email" id="email" name="email" placeholder="Enter E-mail">
            </div>
            </br>
            <div class="form-group">
                <label for="password">Password</label><br>
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password">
            </div>
            <button style="margin-left: auto; margin-right: auto; display: block" class="btn btn-primary" type="submit">Register</button>
        </form>
    </div>

@endsection
