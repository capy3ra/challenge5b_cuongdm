@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <br/>
        <h1 style="color:green;text-align:center;">Your information</h1>
        <br/>
    </div>
    <div class="panel-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{  session('success')  }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{  session('error')  }}
            </div>
        @endif
        <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                @if(auth()->user()->avatar)
                    <img src="{{ url("storage/".Auth::user()->avatar)}}" alt="avatar" width="200px" height="200px" style="border-radius:50%; margin: auto; display: block;">
                @else
                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg" alt="avatar" width="200px" height="200px" style="border-radius:50%; margin: auto; display: block;">
                @endif
                
            </div>
            <div class="mb-3">
                <label for="usr" class="form-label">User name: </label>
                <input type="text" class="form-control" name="urs" require="true" value="{{ auth()->user()->username }}" disabled="disabled">
            </div>
            <a href="{{ route('changePwd.index') }}" class="link-success">Change password</a>

            <div class="mb-3">
                <label for="full-name" class="form-label">Full name: </label>
                <input type="text" class="form-control" name="full-name" require="true" value="{{ auth()->user()->full_name }}" disabled="disabled">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address: </label>
                <input type="email" class="form-control" name="email" require="true" value="{{ auth()->user()->email }}">
            </div>
            <div class="mb-3">
                <label for="phone-number" class="form-label">Phone number: </label>
                <input type="tel" class="form-control" name="phone-number" require="true" value="{{ auth()->user()->phone_number }}">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar: </label>
                <input type="file" class="form-control" name="avatar" require="true">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role: </label>
                <input type="text" class="form-control" name="isTeacher" require="true" value="@if(auth()->user()->isTeacher) {{"Teacher"}} @else {{ "Student" }} @endif" disabled="disabled">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
