@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <br/>
        <h1 style="color:green;text-align:center;">Information of student and teacher</h1>
        <br/>
    </div>
    <div class="panel-body">
        <a href="{{ route('userList.create') }}"><button class="btn btn-primary">Add user</button></a>
        <br/>
        <br/>
        @if(session('success'))
            <div class="alert alert-success">
                {{  session('success')  }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    {{-- Role --}}
                    @if($user->isTeacher === 1)
                        <td>Teacher</td>

                    @else
                        <td>Student</td>
                    @endif
                    @if(auth()->user()->isTeacher == 1)
                        <td><a href="{{ route('userList.edit', $user->id) }}"><button class="btn btn-warning">Edit</button></a></td>
                        <td><a href="{{ route('userList.detail', $user->id) }}"><button class="btn btn-primary">Detail</button></a></td>
                        <td><a href="{{ route('userList.delete', $user->id) }}"><button class="btn btn-danger">Delete</button></a></td>
                    @endif
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()
