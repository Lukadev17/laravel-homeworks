@extends('layout')
@section('content')

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/questions') }}"  class="btn btn-primary stretched-link">Home</a>
                <a href="{{ url('/questions/create') }}" class=" btn btn-secondary stretched-link">Add Question</a>
                <a href="{{route('logout')}}"  class=" btn btn-danger stretched-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{route('logout')}}" method="post">
                    {{csrf_field()}}
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
            @endif
        </div>
    @endif

    <div style="display: block; text-align: center">
        @if(count($questions) > 0)
            <h1>Questions</h1>
            @foreach($questions as $question)
                <div class="container">
                    <h2>{{$question->question}}</h2>
                    @foreach($question -> answers as $answer)
                        <div>
                            @if($answer->correct_answer == 1)
                                <p style="border: #2ecc71 2px"><span class="border border-success">{{$answer->answer}}</span></p>
                            @else
                                <p>{{$answer->answer}}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <p style="color: red">There are no questions, click  add question</p>
        @endif
    </div>

@endsection
