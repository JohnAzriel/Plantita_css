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


    <title>Edit Order</title>
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        background-image: url("https://img.freepik.com/premium-photo/small-green-leaves-hedge-wall-texture-background-closeup-green-hedge-plant-garden-eco_33867-2500.jpg?w=2000");
        background-size: 100%;
        background-repeat: repeat-y;
    }
    .container{
        border: 1px solid black;
        height: auto;
        width: 1000px;;
        padding: 20px;
        background: rgba(255, 255, 255, 0.31);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(14.5px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.90);
        background-color: white;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    h1{
        font-size: 60px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    table{
        background-color: white;
        text-align: center;
        border: 1px solid black;
        padding: 30px;
    }
</style>
<body>
    <br><br>
    <div class="container">
        <center>
            <h1>Edit Order</h1>
        </center>
        <div class="row">
            <div class="col mb-3">
        @foreach ($plantitas as $plantita)
            <label>Customer Name</label>
            <input type="text" class="form-control" value="{{ $plantita->first_name . ' ' . $plantita->last_name }}"readonly>
            </div>
            <div class="col mb-3">
            <label>Customer Gcash Number</label>
            <input type="text" class="form-control" value="{{ $plantita->gcash_no }}" readonly>
            </div>
            </div>
        <div class="row">
            <div class="col mb-3">
            <label>Customer Gcash Reference Number</label>
            <input type="text" class="form-control" value="{{ $plantita->gcashrefno }}" readonly>
            </div>
            <div class="col mb-3">
            <label>Customer Payment Amount</label>
            <input type="text" class="form-control" value="{{ $plantita->amount }}" readonly>
            </div>
            </div>
        <div class="row">
            <div class="col mb-3">
            <label>Order No</label>
            <input type="text" class="form-control" value="{{ $plantita->orderno }}" readonly>
            </div>
            <div class="col mb-3">
            <label>Trans No</label>
            <input type="text" class="form-control" value="{{ $plantita->transno }}" readonly>
            </div>
            </div>
        <div class="row">
            <div class="col mb-3">
            <label>Item No</label>
            <input type="text" class="form-control" value="{{ $plantita->itemno }}" readonly>
            </div>
            <div class="col mb-3">
            <label>Description</label>
            <input type="text" class="form-control" value="{{ $plantita->itemdesc }}" readonly>
            </div>
            </div>
        <div class="row">
            <div class="col mb-3">
            <label>Price</label>
            <input type="text" class="form-control" value="{{ $plantita->price }}" readonly>
            </div>
            <div class="col mb-3">
            <form action="{{ $plantita->transno }}" method="post">
                @csrf
                <label>Status</label>
                <select class="form-select" name="status">
                    <option value="On Process" {{ $plantita->status == 'On Process' ? 'selected' : '' }}>On
                        Process</option>
                    <option value="Cancelled" {{ $plantita->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                    </option>
                    <option value="Paid" {{ $plantita->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="TBD" {{ $plantita->status == 'TBD' ? 'selected' : '' }}>To Be Delivered</option>
                </select>
                </div>
                </div>
            <label>Image</label>
            <div class="d-flex justify-content-center">
                <img class="img-fluid" src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image"
                    width="100%" height="auto">
            </div>
                <br>
                <div class="form-group">
                    <label for="remarks" class="form-label">Remarks</label>
                    <textarea class="form-control" name="remarks" id="remarks" rows="2">{{ $plantita->remarks }}</textarea>
                </div>
                <br>
                <center>
                <input type="submit" class="btn btn-warning btn-block" value="Update">
            </form>

            <button class="btn btn-danger"><a onclick="history.back();">Cancel</a></button>
            </center>
        @endforeach
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
}
?>
