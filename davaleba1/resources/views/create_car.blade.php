@extends('layout.layout')
@section('content')
    <div style="margin: 32px">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li style="color: #e74c3c">{{$error}}</li>
            @endforeach
        @endif
    </div>
        <table>
            <tr>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Color</th>
                <th>Engine</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <form method="post" action="{{route('cars.save')}}">
                @csrf
                <tr>
                    <td><input type="text" id="car-manufacturer" name="manufacturer" value=""></td>
                    <td><input type="text" id="car-model" name="model" value=""></td>
                    <td><input type="text" id="car-color" name="color" value=""></td>
                    <td><input type="text" id="car-engine" name="engine" value=""></td>
                    <td><input type="text" id="car-price" name="price" value=""></td>
                    <td><button class="btn btn-outline-success" type="submit">ADD</button></td>
                </tr>
            </form>
        </table>
    </div>
@endsection
