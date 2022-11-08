@extends('layouts.app')
@section('content')
    <div class="panel-heading">
        <br/>
        <h1 style="color:green;text-align:center;">Home</h1>
        <br/>
    </div>
    <div class="panel-body">
        <div class="md-3">
            <li class="list-group-item"><a href="{{route('userList.index')}}" style="text-decoration: none; color: black;" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='black'">User list</a></li>
        </div>
        <div class="md-3">
            <li class="list-group-item"><a href="{{route('classroom.index')}}" style="text-decoration: none; color: black;" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='black'">Assignment</a></li>
        </div>
        <div class="md-3">
            <li class="list-group-item"><a href="" style="text-decoration: none; color: black;" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='black'">Challenge</a></li>
        </div>
    </div>
@endsection
