@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <br/>
        <h1 style="color:green;text-align:center;">Change password for {{ auth()->user()->full_name }}</h1>
        <br/>
    </div>
    <div class="panel-body">
        @if(session('error'))
            <div class="alert alert-danger">
                {{  session('error')  }}
            </div>
        @endif
        <form action="{{ route('changePwd.index') }}" method="POST">
            @csrf
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="oldPasswordInput" class="form-label">Old Password</label>
                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                        placeholder="Old Password">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="newPasswordInput" class="form-label">New Password</label>
                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                        placeholder="New Password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                        placeholder="Confirm New Password">
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
@endsection
