@extends('layout.layout')
@section('content')
{{--    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">--}}
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('posts') }}" class="btn btn-lg btn-primary">Home</a>
                    <a href="{{url('posts/create')}}"  class="btn btn-lg btn-secondary" >Create</a>
                    <a href="{{route('logout')}}"  class="btn btn-lg btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        {{csrf_field()}}
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-lg btn-secondary" >Register</a>
                    @endif
                @endif
            </div>
        @endif
            <p>Username:  {{ Auth::user()->name }}</p>
            <p>email: {{ Auth::user()->email }} </p>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    @foreach($posts as $myPost)
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('getPost', $myPost->id)}}" >{{$myPost->title}}</a></div><br/>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('editPost', $myPost->id)}}" class="btn btn-lg btn-warning">EDIT</a></div>
                                <form method="post" action="{{route('deletePost', $myPost->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        <button class="btn btn-lg btn-danger" type="submit" class="btn btn-warning">DELETE</button>
                                    </div>
                                </form>
                            </div>

                            <div class="ml-12">
                                <div>
                                    {{$myPost->post_text}}
                                </div>
                            </div>
                        </div>
                        <br/>
                    @endforeach
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
