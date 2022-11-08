@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <br/>
        <h1 style="color:green;text-align:center;">Your information</h1>
        <br/>
    </div>
<form method="post">
    <div class="mb-3">
        <img src="https://tutihealth.com/wp-content/uploads/2022/10/meme-meo-khoc-thet.jpg" alt="avatar" width="200px" height="200px" style="border-radius:50%; margin: auto; display: block;">
    </div>
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