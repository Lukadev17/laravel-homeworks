@extends('layout.layout')
@section('content')
    <table>
            <tr>
                <th>ID</th>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Color</th>
                <th>Engine</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{$phone->id}}</td>
                <td>{{$phone->manufacturer}}</td>
                <td>{{$phone->model}}</td>
                <td>{{$phone->color}}</td>
                <td>{{$phone->engine}}</td>
                <td>{{$phone->price}}$</td>
                <td>
                    <form method="get">
                        <button class="btn btn-outline-primary" >EDIT</button>
                    </form>
                    <form method="post" action="{{route('cars.delete', $car->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" >DELETE</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
@endsection
