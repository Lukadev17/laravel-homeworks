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
            <form method="post" action="{{route('cars.update', $car->id)}}">
                @csrf
                @method('PUT')
                <tr>
                    <td>{{$car->id}}</td>
                    <td><input type="text" id="car-manufacturer" name="manufacturer" value="{{old('manufacturer', $car->manufacturer)}}"></td>
                    <td><input type="text" id="car-model" name="model" value="{{old('model', $car->model)}}"></td>
                    <td><input type="text" id="car-color" name="color" value="{{old('color', $car->color)}}"></td>
                    <td><input type="text" id="car-engine" name="engine" value="{{old('engine', $car->engine)}}"></td>
                    <td><input type="text" id="car-price" name="price" value="{{old('price', $car->price)}}"></td>
                    <td><button class="btn btn-outline-primary" type="submit">EDIT</button></td>
                </tr>
            </form>
        </table>
    </div>
@endsection
