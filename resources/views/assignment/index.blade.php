@extends('layouts.app')
@section('content')
    <div class="panel-heading">
    <br/>
        <h1 style="color:green;text-align:center;">Assignment Management</h1>
    <br/>
    </div>
    @if(auth()->user()->isTeacher )
        <td><a href="{{route('classroom.create')}}"><button class="btn btn-success">Add</button></a></td>
    @endif
    <div class="panel-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif()
        @foreach($assignments as $assignment)
        <div class="mb-3" style="border-radius: 5px;">
            <h5 class="display-3">
            <small class="text-muted">{{ $assignment->title }}</small>
            </h5>
            <label for="des" class="form-label">Description: </label>
            <br/>
            <textarea rows="5" cols="75" id="des" disabled>{{ $assignment->description }}</textarea>
            <br/>
            {{-- {{ asset('storage/assignments/mcPmRhzZSH_PROG01.pdf');}} --}}
            <td><a href="{{route('classroom.assignment.download', $assignment->id)}}"><button class="btn btn-warning">Download</button></a></td>
            @if(auth()->user()->isTeacher )
                <td><a href="{{route('classroom.assignment.detail', $assignment->id)}}"><button class="btn btn-primary">Detail</button></a></td>
            @endif
            @if(!auth()->user()->isTeacher )
                <td><a href="{{route('classroom.assignment.submit', $assignment->id)}}"><button class="btn btn-success">Submit</button></a></td>
            @endif
            <hr/>
        </div>
        @endforeach
@endsection()
