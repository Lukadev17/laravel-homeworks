@extends('layout.layoutWithNavbar')
@section('content')
{{--    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">--}}
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    {{--                    <a href="{{ url('posts') }}" class="btn btn-lg btn-primary">Home</a>--}}
                    {{--                    <a href="{{url('posts/create')}}"  class="btn btn-lg btn-secondary" >Create</a>--}}
                    {{--                    <a href="{{route('logout')}}"  class="btn btn-lg btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>--}}
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        {{csrf_field()}}
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-lg btn-secondary">Register</a>
                    @endif
                @endif
            </div>
        @endif
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
           <div>
                <div class="p-6"style="margin: auto; width: 80%; border: 3px solid #212529;" >
                    <div class="flex items-center">
                        <div class="ml-4 text-lg leading-7 font-semibold"><p class="text-gray-900 dark:text-white">{{$post->title}}</p></div>
                    </div>
                    <div class="ml-4">
                        <div>
                            {{$post->post_text}}
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <div class="d-flex flex-row justify-content-center mt-lg-4">
                            <h4>Comments</h4>
                        </div>
                        <div>
                            <form method="post" action="{{route('post_comment', $post)}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="comment" name="comment" type="text" class="form-control" placeholder="Write Comment" aria-label="Write Comment" aria-describedby="basic-addon2" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <span style="color: #e2452f">{{$error}}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="container mt-5">
                            @foreach($post->comments as $comment)
                                <div class="card bg-light mb-3" style="border: 1px solid #1a202c">
                                    <div class="card p-3" >
                                        <div >
                                            <div class="user d-flex flex-row align-items-center font-weight-bold" >
                                                Author: {{$comment->user->name}}
                                            </div>
{{--                                            @can('deleteComment', $comment)--}}
{{--                                                <form method="post" action="{{route('delete_comment', $comment)}}">--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    @csrf--}}
{{--                                                    <button style="border-radius: 4px" type="submit" class="btn btn-danger btn-sm m-1">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">--}}
{{--                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>--}}
{{--                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>--}}
{{--                                                        </svg>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            @endcan--}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{$comment->body}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        </li>
                        </ul>
                    </div>
                </div>
           </div>

@endsection

