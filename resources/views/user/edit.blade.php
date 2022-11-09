@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <br/>
        <h1 style="color:green;text-align:center;">Edit information</h1>
        <br/>
    </div>
    <div class="panel-body">
        <form method="post" action="{{ route('userList.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                @if($user->avatar)
                    <img src="{{ url("storage/".$user->avatar)}}" alt="avatar" width="200px" height="200px" style="border-radius:50%; margin: auto; display: block;">
                @else
                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg" alt="avatar" width="200px" height="200px" style="border-radius:50%; margin: auto; display: block;">
                @endif
            </div>
            <div class="mb-3">
                <label for="usr" class="form-label">User name: </label>
                <input type="text" class="form-control" name="urs" require="true" value="{{ $user->username }}" disabled="disabled">
            </div>
            <div class="mb-3">
                <label for="full-name" class="form-label">Full name: </label>
                <input type="text" class="form-control" name="full-name" require="true" value="{{ $user->full_name }}" disabled="disabled">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address: </label>
                <input type="email" class="form-control" name="email" require="true" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="phone-number" class="form-label">Phone number: </label>
                <input type="tel" class="form-control" name="phone-number" require="true" value="{{ $user->phone_number }}">
            </div>
            <div class="mb-3">
                <input class="btn btn-success" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
