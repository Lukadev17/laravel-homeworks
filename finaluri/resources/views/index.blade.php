@extends('layout.layout')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="mb-2">
                <a  href="{{ route('login') }}"  class="btn btn-lg btn-primary">Login</a>
            </div>
            <a href="{{ route('register') }}"  class="btn btn-secondary btn-lg">Register</a>
        </div>
    </div>
@endsection
