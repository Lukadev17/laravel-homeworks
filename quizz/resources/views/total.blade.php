@extends("layout")
@section("content")
    <body >
    <div style="width: 100%">
    <div style="display: flex; align-content: space-between; justify-content: center">
    <h1 >Your final result is:&nbsp; </h1>
        <h1 style="color: green">{{$total}}</h1>
    </div>
    </div>
    </body>

@endsection
