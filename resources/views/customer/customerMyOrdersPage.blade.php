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


    <title>My Orders</title>

    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>
</head>
<style>
    body{
        --bg-image: url("https://img.freepik.com/free-photo/green-houseplant-background-plant-lovers_53876-128849.jpg?w=1380&t=st=1687796573~exp=1687797173~hmac=5673453f62494d24f213dcf84e1abbb1c1fa87633209cc94136dc85595bbc33a");
        --bg-image-opacity: 0.5;
        padding: 0;
        margin: 0;
        position: relative;
        isolation: isolate;
    }
    body::after{
        content: '';
        z-index: -1;
        inset: 0;
        position: absolute;
        background-image: var(--bg-image);
        background-size: cover;
        background-repeat: no-repeat;
        opacity: var(--bg-image-opacity);
    }
    h1{
        font-size: 80px;
        font-weight: bold;
        color: white;
        -webkit-text-stroke: 2px black;
    }
    .card{
            margin: 0 auto;
            max-width: 1000px;
            display: grid;
            grid-template-columns:repeat(auto-fill, minmax(225px, 1fr));
            gap: 20px;
        }
        .card-img-top{
            width: 100%;
            display: block;
        }
    h5{
        font-size: 24px;
    }
    p{
        font-size: 18px;
    }
    .btn-cancel{
        width: 100%;
        height: auto;
        color: red;
        background-color: white;
        border: 1px solid red;
    }
    .btn-cancel:hover{
        color: white;
        background-color: red;
    }

</style>

<body>
    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show">
            <div class="container">
                <center>
                    {{ session('warning') }}
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <br><br>
    <div class="container">
        <center>
            <h1>My Orders</h1>
        </center>

        <br><br><br>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/images/' . $user->img) }}" class="card-img-top" alt="Plantita Image">
                        <div class="card-body">
                            <h5 class="card-title">Description: {{ $user->itemdesc }}</h5>
                            <p class="card-text">Price: ₱{{ $user->price }}</p>
                            <p class="card-text">Amount Paid: ₱{{ $user->amount }}</p>
                            <p class="card-text">GCash Reference Number: {{ $user->gcashrefno }}</p>
                            <td>
                                <p class="card-text">Status:
                                    @if ($user->status == 'On Process')
                                        <span style="color: orange">{{ $user->status }}</span>
                                    @elseif ($user->status == 'To be Delivered')
                                        <span style="color: blue">{{ $user->status }}</span>
                                    @elseif ($user->status == 'Paid')
                                        <span style="color: green">{{ $user->status }}</span>
                                    @elseif ($user->status == 'Cancelled')
                                        <span style="color: red">{{ $user->status }}</span>
                                    @else
                                        {{ $user->status }}
                                    @endif
                                </p>
                            </td>
                            <p class="card-text">Remarks: {{ $user->remarks }}</p>
                            <form action="{{ route('customerOrders.destroy', $user->transno) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <center><button type="submit" class="btn btn-cancel"
                                    onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <center><a href="/customerPage" class="btn btn-primary">Go back to Home Page</a></center>
    </div>
    <br><br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
}
?>
