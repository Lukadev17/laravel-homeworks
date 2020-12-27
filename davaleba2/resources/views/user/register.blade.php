@extends('layout.layout')
@section('content')
    <div>
        <form method="post" action="{{route('post_register')}}">
            @csrf
            <h1>Register</h1>
            <div class="form-group">
            <label for="name">Username</label><br>
            <input class="form-control" type="text" id="name" name="name"><br>
            </div>
            <div class="form-group">
            <label for="email">Email</label><br>
            <input class="form-control" type="email" id="email" name="email">
            </div>
            </br>
            <div class="form-group">
            <label for="password">Password</label><br>
            <input class="form-control" type="password" id="password" name="password">
            </div>
            <button style="margin-left: auto; margin-right: auto; display: block" class="btn btn-primary" type="submit">Register</button>
        </form>
    </div>

@endsection
