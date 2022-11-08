@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <br/>
        <h1 style="color:green;text-align:center;">Challenger</h1>
        <br/>
    </div>
    @if(auth()->user()->isTeacher)
        <a href="{{route('challenge.create')}}"><button class="btn btn-success">Create question</button></a>
    @endif
    <div class="panel-body">
        @foreach($challenges as $challenge)
        <div class="mb-3" style="border-radius: 5px;">
            <h5 class="display-4">{{$challenge->title}}
            </h5>
            <label for="des" class="form-label">HINT: </label>
            <br/>
            <textarea rows="5" cols="75" id="des" disabled>{{$challenge->hint}}</textarea>
            <br/>
            @if(!auth()->user()->isTeacher)
            <a href="{{ route('challenge.answer', $challenge->id)}}"><button class="btn btn-success">Answer</button></a>
            @endif
            <hr/>
        </div>
        @endforeach
    </div>
@endsection()