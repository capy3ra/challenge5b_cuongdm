@extends('layouts.app')
@section('content')
<div class="panel-heading">
<br/>
<h1 style="color:green;text-align:center;">Answer the question</h1>
<br/>
</div>
<div class="panel-body">
<form method="post" action="{{route('challenge.submit')}}">  
    @csrf
    <div class="mb-3">
        <h1><small>Title:  </small><strong>{{$challenge->title}}</strong></h1>
    </div>
    <input type="hidden" value="{{$challenge->id}}" name="id_challenge"/>
    <div class="mb-3">
        <label for="hint" class="form-label">HINT: </label>
        <br/>
        <textarea rows="5" cols="90" disabled>{{$challenge->hint}}</textarea>
    </div>
    <div class="form-group">
        <label for="ans">Enter: </label>
        <input type="text" class="form-control" name="ans">
    </div>
    <br/>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Answer</button>
    </div>
</form>
</div>

@endsection 
