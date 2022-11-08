@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <h1 style="color:green;text-align:center;">Add New Assignment</h1>
        <br/>
    </div>
    <div class="panel-body">
        @if(session('error'))
            {{session('error')}}
        @endif()
        <form method="POST" action="{{ route('classroom.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title: </label>
                <input type="text" class="form-control" id="title" required name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description: </label>
                <input type="text" class="form-control" id="description" required name="description">
            </div>
            <div class="mb-3">
                <label for="path_file" class="form-label">File assignment: </label>
                <input type="file" class="form-control" id="path_file" required name="path_file">
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>
@endsection 
