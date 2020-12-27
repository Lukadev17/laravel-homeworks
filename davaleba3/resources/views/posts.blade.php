@extends('layout.layout')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
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
                        <a href="{{ route('register') }}" class="btn btn-lg btn-secondary">Register</a>
                    @endif
                @endif
            </div>
        @endif
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div>
                    @foreach($posts as $post)
                        <div class="p-6 post">
                        <div  style="border: 1px solid black">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{route('getPost', $post->id)}}" class="underline text-gray-900 dark:text-white">{{$post->title}}</a></div>
                                <br/>
                                @can('approve', $post)
                                    <div>
                                        @if($post->is_approved)
                                            <button type="submit" class="btn-dark approved" disabled>The article was approved</button>
                                        @else
                                            <button type="submit" class="btn-dark" url="{{route('approve', $post->id)}}">Click to Approve</button>
                                        @endif
                                    </div>
                                @endcan
                                <br/>
                            </div>

                            <div class="ml-12">
                                <div>
                                    {{$post->post_text}}
                                </div>
                                <div><p class="text-gray-900 dark:text-white">Author: {{$post->user()->first()->name}}</p></div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.btn-dark', function (e) {
                e.preventDefault();
                $this = $(this)
                // $this.attr('disabled', 'disabled');
                $.ajax({
                    type: 'POST',
                    url:  $this.attr('url'),
                    success: function () {
                        $this.addClass('approved');
                        // $this.attr('disabled', 'disabled');
                        $this.text('The article was approved');
                    }
                });
            });
        });
    </script>

@endsection
