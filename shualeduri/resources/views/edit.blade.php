@extends('home')
@section('child-content')
    <div style="margin: 45px">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li style="color: #009879">{{$error}}</li>
            @endforeach
        @endif
    </div>
    <div>
        <table class="styled-table" style="margin: auto">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <form method="post" action="{{route('applicant.edit', $applicant->id)}}">
                @csrf
                @method('PUT')
                <tr>
                    <td>{{$applicant->id}}</td>
                    <td><input type="text" id="name" value="{{ $applicant->name  }}" name="name" placeholder="edit name"></td>
                    <td><input type="text" id="surname" value="{{ $applicant->surname  }}"  name="surname" placeholder="edit surname"></td>
                    <td><input type="text" id="position" value="{{ $applicant->position  }}" name="position" placeholder="edit position"></td>
                    <td><input type="text" id="phone" value="{{ $applicant->phone  }}" name="phone" placeholder="edit phone"></td>
                    <td><input type="submit" value="SAVE"></td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
@endsection
