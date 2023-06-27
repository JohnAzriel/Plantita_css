<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Login</title>
</head>

<style>
    body{
        margin: 0;
        padding: 0;
        background-image: url("https://wallpaper.dog/large/20474624.jpg");
        background-repeat: no-repeat;
        background-size: 100%;
    }   
    .container{
        position: absolute;
        margin-left: 330px;
        margin-top: 130px;
    }
    .card{
        width: 500px;
        height: 500px;
        background: rgba(255, 255, 255, 0.31);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(9.5px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.90);
    }
    .form-control{
        width: 465px;
        margin-bottom: 20px;
    }
    .card-title{
        color: green;
        font-weight: bold;
        font-size: 50px;
        margin-bottom: 30px;
        margin-top: 30px;
    }
    .btn{
        background-color: white;
        color: green;
        border: 1px solid green;
        border-radius: 4px;
        width: 120px;
        margin-bottom: 20px;
    }
    .btn:hover{
        background-color: green;
        color: white;
    }
    .card-text{
        text-align: center;
    }
</style>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <center>
                {{ session('success') }}

            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <center>
                {{ session('error') }}

            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br><br><br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <center><p class="card-title">Plantita</p></center>
                        <form action="login" method="post">

                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter username">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <center><button type="submit" class="btn">Login</button></center>
                        </form><br>
                        <p class="card-text">Don't have an account? Click <a href="/signup">here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
