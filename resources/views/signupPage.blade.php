<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <title>Signup</title>
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
        padding: 30px;
        width: 700px;
        margin-top: 120px;
        margin-bottom: 20px;
        background: rgba(255, 255, 255, 0.31);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(14.5px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.90);
    }
    .btn{
        background-color: white;
        color: green;
        border: 1px solid green;
        border-radius: 4px;
        width: 635px;
        margin-top: 20px;
        margin-bottom: 10px;
    }
    .btn:hover{
        background-color: green;
        color: white;
    }
    .row {
        display: flex;
    }
    .column {
        flex: 50%;
    }
    h1{
        margin-bottom: 20px;
    }
</style>
<body>
    <div class="container">
                <form action="signup" method="post">
                    @csrf
                    <h1>Sign Up</h1>
                <div class="row">
                    <div class="column mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control"
                            placeholder="Input First name" value="{{ old('first_name') }}">
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="column mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                            placeholder="Input Last name" value="{{ old('last_name') }}">
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="column mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            placeholder="Input Address" value="{{ old('address') }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="column mb-3">
                        <label for="userBirthday" class="form-label">Birthday</label>
                        <input type="date" name="userBirthday" id="userBirthday" class="form-control"
                            value="{{ old('userBirthday') }}">
                        @error('userBirthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="column mb-3">
                        <label for="gcashno" class="form-label">Gcash Number</label>
                        <input type="text" name="gcashno" id="gcashno" class="form-control"
                            placeholder="Input Gcash Number" value="{{ old('gcashno') }}">
                        @error('gcashno')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="column mb-3">
                        <label for="usertype" class="form-label">Type</label>
                        <select name="usertype" id="usertype" class="form-control">
                            <option value="">User Type</option>
                            <option value="customer" {{ old('usertype') == 'customer' ? 'selected' : '' }}>Customer
                            </option>
                            <option value="seller" {{ old('usertype') == 'seller' ? 'selected' : '' }}>Seller</option>
                        </select>
                        @error('usertype')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                    <div class="column mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Input Username" value="{{ old('username') }}">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="column mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Input Password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>  
                    <div class="column mb-3">
                        <label for="password2" class="form-label">Re-Type Password</label>
                        <input type="password" name="password2" id="password2" class="form-control"
                            placeholder="Re-Type Password">
                        @error('password2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <center>
                    <div class="column mb-3">
                        <input type="submit" value="Create Account" name="create" class="btn">
                    </div>
                    </center>
                </form>

                <center><a href="/login">Go back to the login page</a></center>
    </div>

</body>


</html>
