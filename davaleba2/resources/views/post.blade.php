@extends('layout.layout')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('posts') }}" class="btn btn-lg btn-primary">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-lg btn-secondary">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Register</a>
                    @endif
                @endif
            </div>
        @endif
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold"><p class="text-gray-900 dark:text-white">{{$post->title}}</p></div>
                        </div>
                        <div class="ml-12">
                            <div>
                                {{$post->post_text}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection
