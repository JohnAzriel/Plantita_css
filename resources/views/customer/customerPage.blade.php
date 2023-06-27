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
        <div class="row justify-content-center mb-5">
            <div class="col mb-5-md-6">
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


    <title>Homepage</title>
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
        border: 1px solid black;
        height: 90vh;
        padding: 20px;
        background: rgba(255, 255, 255, 0.31);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(14.5px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.90);
    }
    .container-options{
        height: 75vh;
        width: auto;
        padding: 20px 20px 20px 20px;
        margin-top: 20px;
    }
    .container-option.row {
        display: flex;
        align-content: center;
    }
    .container-option.column {
        flex: 50%;
    }
    .btn{
        font-size: 40px;
        height: 310px;
        width: 310px;
        padding: 10px;
        border-radius: 15px;
        box-shadow: -13px 13px #9DB2BF;
        transition: transform .3s;
    }
    .btn:hover{
        transform: scale(1.1);
    }
    .btn-account{
        border: 3px solid #0078AA;
        font-weight: bold;
        background-image: url("https://img.freepik.com/free-photo/application-contact-communication-connection-concept_53876-120049.jpg?size=626&ext=jpg");
        opacity: 0.8;
        background-size: cover;
        background-repeat: no-repeat;
    }
    span-account{
        background-color: #2F89FC;
        padding: 5px 5px 5px 5px;
        border-radius: 6px;
        color: white;
        -webkit-text-stroke: 1px black;
    }
    .btn-market{
        border: 3px solid yellow;
        font-weight: bold;
        background-image: url("https://img.freepik.com/free-photo/top-view-succulent-plants-pot_23-2147918568.jpg?size=626&ext=jpg");
        opacity: 0.8;
        background-size: cover;
        background-repeat: no-repeat;
    }
    span-market{
        background-color: yellow;
        padding: 5px 5px 5px 5px;
        border-radius: 6px;
        color: white;
        -webkit-text-stroke: 1px black;
    }
    .btn-order{
        border: 3px solid green;
        font-weight: bold;
        background-image: url("https://img.freepik.com/free-photo/wooden-box-with-fresh-green-parsley-cilantro-isolated-white-table-side-view_346278-1447.jpg?size=626&ext=jpg");
        opacity: 0.8;
        background-size: cover;
        background-repeat: no-repeat;
    }
    span-order{
        background-color: lime;
        padding: 5px 5px 5px 5px;
        border-radius: 6px;
        color: white;
        -webkit-text-stroke: 1px black;
    }
    .btn-logout{
        border: 3px solid red;
        font-weight: bold;
        background-image: url("https://img.freepik.com/premium-photo/circle-start-button-symbol-pink-3d-visualization_272415-71.jpg?size=626&ext=jpg");
        opacity: 0.8;
        background-size: contain;
        background-repeat: no-repeat;
    }
    span-logout{
        background-color: red;
        padding: 5px 5px 5px 5px;
        border-radius: 6px;
        color: white;
        -webkit-text-stroke: 1px black;
    }
    p{
        font-size: 70px;
        font-weight: bold;
        font-style: italic;
        color: green;
        -webkit-text-stroke: 1px white;
        text-shadow: -3px 3px #888888;
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
    <br><br>
    <div class ="container">
    <center>
        <p>WELCOME TO PLANTITA 
        </p>
    <div class="container-options">
        <div class="row">
            <div class="col mb-5">
            <form action="customerMyAcc" method="post">
                @csrf
                    <button type="submit" class="btn btn-account"><span-account>My Account</span>
                    </button>
            </form>
            </div>
            <div class="col mb-5">
            <form action="customerMarketplaceDirect" method="post">
                @csrf
                <button type="submit" class="btn btn-market"><span-market>Marketplace</span>
                </button>
            </form>
            </div>
        </div>
        <div class="row">
            <div class="col mb-5">
            <form action="customerMyOrdersDirect" method="post">
                @csrf
                <button type="submit" class="btn btn-order"><span-order>My Orders</span>
                </button>
            </form>
            </div>
            <div class="col mb-5">
            <a href="/logout"><button type="submit" class="btn btn-logout"><span-logout>Logout</span>
            </button></a>
            </div>
        </div>
</center>
</div>
</div>
</body>

</html>
<?php
}
?>
