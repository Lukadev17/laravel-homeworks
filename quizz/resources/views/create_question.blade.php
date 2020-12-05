@extends('layout')
@section("content")
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/questions') }}" class="btn btn-primary">Home</a>
                <a href="{{route('logout')}}" class="btn btn-danger"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{route('logout')}}" method="post">
                    {{csrf_field()}}
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
            @endif
        </div>
    @endif

    <div style="margin: 32px">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li style="color: #e2452f">{{$error}}</li>
            @endforeach
        @endif
    <body>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="{{route('questions.save')}}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                    <input type="text" class="form-control"
                           placeholder="Enter question" name="question"/>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer 1</label>
                    <input type="text" class="form-control"
                           placeholder="answer 1" name="answer_1"/>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Answer 2</label>
                    <input type="text" class="form-control"
                           placeholder="answer 2" name="answer_2"/>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Answer 3</label>
                    <input type="text" class="form-control"
                           placeholder="answer 3" name="answer_3"/>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Answer 4</label>
                    <input type="text" class="form-control"
                           placeholder="answer 4" name="answer_4"/>
                </div>
                <div class="form-group">
                    <label for="correct_answer">choose correct answer</label>
                    <select name="correct_answer">
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-outline-success" >Add question</button>

                </div>
            </div>
        </form>
    </div>

    </body>
@endsection
