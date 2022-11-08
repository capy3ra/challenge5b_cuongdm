<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <br/>
            <h1 style="color:green;text-align:center;">Login Page</h1>
            <br/>
        </div>
        <div class="panel-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @elseif(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{  route('auth.check-login') }}">
                @csrf
                <div class="mb-3">
                    <label for="usr" class="form-label">User name: </label>
                    <input type="text" class="form-control" id="usr" required name="username" placeholder="Enter your username">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password: </label>
                    <input type="password" class="form-control" id="pwd" required name="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-success" name="login">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
