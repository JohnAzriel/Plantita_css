<?php

if(session('regno') == null){
    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login Required</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="alert alert-warning text-center">
                    <h4>Please log in to access this page.</h4>
                    <p>If you don't have an account, you can <a href="/signup">sign up here</a>.</p>
                    <p>Already have an account? <a href="/login">Log in</a> to continue.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
} else{
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <title>Edit My Account</title>
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        background-image: url("https://wallpapercave.com/wp/wp9247391.jpg");
        background-size: 100%;
        background-repeat: no-repeat;
    }
    .container{
        padding-top: none;
        margin-left: 900px;
        width: 700px;
        margin-top: 120px;
        margin-bottom: 20px;
        background: rgba(255, 255, 255, 0.31);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10.5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.90);
    }
    .row {
        display: flex;
    }
    .column {
        flex: 50%;
    }
    h1{
        margin-top: 40px;
        margin-bottom: 40px;
    }
    .btn-update{
        background-color: white;
        color: orange;
        border: 1px solid orange;
        border-radius: 4px;
        width: 300px;
        margin-top: 20px;
        margin-bottom: 10px;
    }
    .btn-update:hover{
        background-color: orange;
        color: white;
    }
    .btn-cancel{
        background-color: white;
        color: black;
        border: 1px solid red;
        border-radius: 4px;
        width: 300px;
        margin-bottom: 40px;
    }
    .btn-cancel:hover{
        background-color: red;
        color: white;
    }
</style>

<body>
    <br><br>
    <div class="container">
        <center>
            <h1>Edit My Account</h1>
        </center>

        @foreach ($users as $user)
            <form action="{{ $user->regno }}" method="post">
                @csrf
                <div class="row">
                    <div class="col mb-3">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="first_name"
                        placeholder="Input First name" value="{{ $user->first_name }}">
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="col mb-3">
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="last_name"
                        placeholder="Input Last name" value="{{ $user->last_name }}">
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Input Address"
                        value="{{ $user->address }}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="col mb-3">
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="userBirthday"
                        value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}">
                    @error('userBirthday')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                <div class="form-group">
                    <label for="gcashNo">Gcash Number</label>
                    <input type="text" class="form-control" id="gcashNo" name="gcashno"
                        placeholder="Input Gcash Number" value="{{ $user->gcash_no }}">
                    @error('gcashno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="col mb-3">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Input Username" value="{{ $user->username }}">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Input Password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password2">Re-Type Password</label>
                    <input type="password" class="form-control" id="password2" name="password2"
                        placeholder="Input Password">
                    @error('password2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <center>
                <button type="submit" class="btn btn-update">Update Credentials</button>
            </form>
            <br>
            <a href="javascript:void(0);" onclick="history.back();" class="btn btn-cancel">Cancel</a></center>
        @endforeach
    </div>
</body>


</html>
<?php
}
?>
