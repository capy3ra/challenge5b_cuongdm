@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <br/>
        <h1 style="color:green;text-align:center;">Information of {{$curuser->full_name}}</h1>
        <br/>
    </div>
<form method="post">
    @if($curuser->avatar)
        <img src="{{ url("storage/".$curuser->avatar)}}" alt="avatar" width="200px" height="200px" style="border-radius:50%; margin: auto; display: block;">
    @else
        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg" alt="avatar" width="200px" height="200px" style="border-radius:50%; margin: auto; display: block;">
    @endif
    <div class="mb-3">
        <label for="usr" class="form-label">User name: </label>
        <input type="text" class="form-control" name="urs" require="true" value="{{ $curuser->username }}" disabled="disabled">
    </div>

    <div class="mb-3">
        <label for="full-name" class="form-label">Full name: </label>
        <input type="text" class="form-control" name="full-name" require="true" value="{{ $curuser->full_name }}" disabled="disabled">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address: </label>
        <input type="email" class="form-control" name="email" require="true" value="{{ $curuser->email }}" disabled="disabled">
    </div>
    <div class="mb-3">
        <label for="phone-number" class="form-label">Phone number: </label>
        <input type="tel" class="form-control" name="phone-number" require="true" value="{{ $curuser->phone_number }}" disabled="disabled">
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role: </label>
        <input type="text" class="form-control" name="isTeacher" require="true" value="@if($curuser->isTeacher) {{"Teacher"}} @else {{ "Student" }} @endif" disabled="disabled">
    </div>
</form>

@endsection
