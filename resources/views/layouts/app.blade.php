<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="md-3" style="float: right; margin-top:27px;">
        {{-- <img src="<?php echo $avatar_session;?>" alt="avatar" width="40px" height="40px"> --}}
        <a href="{{route('profile.index')}}"><button class="btn btn-success">Profile</button></a>
        <a href="{{route('logout')}}"><button class="btn btn-warning">Log out</button></a>
    </div>
    <div class="panel panel-primary">
        <div style="float: left; margin-top: 27px;">
            <a href="{{route('index')}}"><button class="btn btn-success">Home</button></a>
        </div>
        @yield('content')
    </div>
</div>
</body>
</html>
