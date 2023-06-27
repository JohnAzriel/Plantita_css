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

    {{-- datatable bootsrap --}}
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>

    <title>Order Listing</title>
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
    }
    table{
        background-color: white;
        text-align: center;
        border: 1px solid black;
        padding: 30px;
    }
</style>
<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="container">
                <center>
                    {{ session('success') }}
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col text-center mt-5">
                <h1>List of Orders</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table id="plantitas" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Customer Name</th>
                            <th>Customer Gcash Number</th>

                            <th>Customer Payment Amount</th>
                            <th>Customer Gcash Reference Number</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plantitas as $plantita)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image"
                                        width="250" height="250">
                                </td>
                                <td>
                                    {{ $plantita->itemdesc }}
                                </td>
                                <td>
                                    <span style="color: blue">₱{{ $plantita->price }}</span>

                                </td>
                                <td>
                                    {{ $plantita->first_name . ' ' . $plantita->last_name }}
                                </td>
                                <td>
                                    {{ $plantita->gcash_no }}
                                </td>
                                <td>
                                    @if ($plantita->amount >= $plantita->price)
                                        <span style="color: #03C988">₱{{ $plantita->amount }}</span>
                                    @else
                                        <span style="color: red">₱{{ $plantita->amount }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $plantita->gcashrefno }}
                                </td>
                                <td>
                                    @if ($plantita->status == 'On Process')
                                        <span style="color: orange">{{ $plantita->status }}</span>
                                    @elseif ($plantita->status == 'To be Delivered')
                                        <span style="color: blue">{{ $plantita->status }}</span>
                                    @elseif ($plantita->status == 'Paid')
                                        <span style="color: green">{{ $plantita->status }}</span>
                                    @elseif ($plantita->status == 'Cancelled')
                                        <span style="color: red">{{ $plantita->status }}</span>
                                    @else
                                        {{ $plantita->status }}
                                    @endif
                                </td>
                                <td>
                                    {{ $plantita->remarks }}
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="/edit/{{ $plantita->transno }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <center><a href="/sellerPage" class="btn btn-primary">Go back to Home Page</a></center>
    </div>
    <br><br>

</body>


</html>
<?php

}
?>
