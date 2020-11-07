@extends('home')
@section('child-content')
    <div>
        <table class="styled-table" style="margin: auto">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applicants as $applicant)
                <tr>
                    <td>{{$applicant->id}}</td>
                    <td>{{$applicant->name}}</td>
                    <td>{{$applicant->surname}}</td>
                    <td>{{$applicant->position}}</td>
                    <td>{{$applicant->phone}}</td>
                    @if($applicant->is_hired == false)
                        <td><a href="{{ route('applicant.hired', $applicant->id)  }}" style="color: red;">Not Hired</a></td>
                    @endif
                    @if($applicant->is_hired == true)
                        <td style="color: green;">Hired</td>
                    @endif
                    <td>
                        <form method="get" action="{{route('applicants.edit', $applicant->id)}}">
                            @csrf
                            <button style ="cursor:pointer">EDIT</button>
                        </form>
                    </td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
