@extends('layout.layout')
@section('content')
    <br/>
    <form method="get"  action="{{route('cars.create')}}">
        <button style ="cursor:pointer; margin-left: 5px" class="btn btn-outline-success">ADD Car</button>
        <br/>
        <br/>
    </form>
    <div>
        <table class="styled-table">
            <tr>
                <th>ID</th>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Color</th>
                <th>Engine</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @foreach($cars as $car)
                <tr>
                    <td>{{$car->id}}</td>
                    <td>{{$car->manufacturer}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->color}}</td>
                    <td>{{$car->engine}}</td>
                    <td>{{$car->price}}$</td>
                    <td>
                        <form method="get"   action="{{route('cars.edit', $car->id)}}">
                            <button class="btn btn-outline-primary" >EDIT</button>
                        </form>
                        <form method="post"  action="{{route('cars.delete', $car->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" >DELETE</button>
                        </form>
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
