@extends('layout')
@section('content')

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/quiz') }}" class="btn btn-primary">Home</a>
                <a href="{{route('logout')}}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{route('logout')}}" method="post">
                    {{csrf_field()}}
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
        </div>
    @endif
    <div style="display: block; text-align: center">
        @if(count($questions) > 0)
            <form method="post" enctype="multipart/form-data" action="{{route('quiz.save')}}">
                <h1 style="color: mediumpurple">Quiz</h1>
                @foreach($questions as $question)
                    <div class="container">
                        <h2>{{$question->question}}</h2>
                        <span>სავარაუდო პასუხები</span>
                        <ul class="list-group">
                        @foreach($question -> answers as $answer)
                                <li class="list-group-item">
                                {{$answer->answer}}
                                </li>
                        @endforeach
                        <select  style="text-align: center" class="custom-select" name="{{$question->id}}">
                            @foreach($question->answers as $answer)
                                <option value="{{$answer->id}}">{{$answer->answer}}</option>
                            @endforeach
                        </select>
                        </ul>
                    </div>
                @endforeach
                <br>
                <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                <div>
                    <button class="btn btn-outline-success" type="submit">Submit</button>
                </div>
            </form>
        @else
            <p>No questions found</p>
        @endif
    </div>

@endsection
