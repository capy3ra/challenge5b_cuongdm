@extends('layouts.app')
@section('content')
    <div class="panel-heading">
    <br/>
        <h1 style="color:green;text-align:center;">Submission Management</h1>
    <br/>
    </div>
    <div class="panel-body">
        @if(session('success'))
            {{session('success')}}
        @endif()
        {{-- {{dd($submissions)}} --}}
        @foreach($submissions as $submission)
        <div class="mb-3" style="border-radius: 5px;">
            <h6>From <strong>{{ $submission->user->full_name }}</strong></h6>
            <h5 class="display-5">{{ $submission->title }}
            <small class="text-muted">{{ $submission->updated_at }}</small>
            </h5>
            
            <label for="des" class="form-label">Description: </label>
            <br/>
            <textarea rows="5" cols="75" id="des" disabled>{{ $submission->description }}</textarea>
            <br/>
            <td><a href="{{route('classroom.submission.download', $submission->id)}}"><button class="btn btn-warning">Download</button></a></td>
            <hr/>
        </div>
        @endforeach        
@endsection()
