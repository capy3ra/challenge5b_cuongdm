@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <h1 style="color:green;text-align:center;">Add Student Page</h1>
        <br/>
    </div>
    <div class="panel-body">
        <form method="POST" action="{{ route('userList.store') }}">
            @csrf
            <div class="mb-3">
                <label for="usr" class="form-label">User name: </label>
                <input type="text" class="form-control" id="urs" required name="username">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password: </label>
                <input type="password" class="form-control" id="pwd" required name="password">
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label">Full name: </label>
                <input type="text" class="form-control" id="fullname" required name="full_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" required name="email">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone number: </label>
                <input type="text" class="form-control" id="phone_number" required name="phone_number">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select name="isTeacher" id="role" class="form-select">
                    <option value="1">Teacher</option>
                    <option value="0">Student</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection 
