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


    <title>Preview Orders</title>

    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>

    <style>
        body{
            margin: 0;
            padding: 0;
            background-image: url("https://img.freepik.com/free-photo/green-leaf-texture-leaf-texture-background_501050-160.jpg?w=1380&t=st=1687842946~exp=1687843546~hmac=bfe29f031cec74babf07030268d7dfe47359370bc7ab76fdb662808fa80e3e40");
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .container{
            width: 100%;
            padding: 20px 20px 20px 20px;
            margin-bottom: 40px;
            border: 1px solid red;
            padding: 20px;
            background: rgba(255, 255, 255, 0.31);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(14.5px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.90);
        }
        .product-card{
            margin: 0 auto;
            max-width: 1000px;
            display: grid;
            grid-template-columns:repeat(auto-fill, minmax(225px, 1fr));
            gap: 20px;
            padding: 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(14.5px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.90);
        }
        .product-img-card{
            width: 100%;
            height: auto;
            display: block;
        }

        .product-card h5 {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .product-card p {
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
        }

        .total-price {
            margin-top: 20px;
            margin-bottom: 20px;
            font-weight: bold;
            color: white;
        }
        .total-price{
            font-size: 30px;
        }
        h1{
            -webkit-text-stroke: 1px black;
            font-weight: bold;
            color: white;
            font-size: 60px;
            margin-bottom: 30px;
        }
    </style>


</head>


<body>
    <br><br>
    <div class="container">
        <center>
            <h1>My Plantita Cart</h1>
        </center>
        <form action="{{ route('customerPayment.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                @foreach ($orders as $order)
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{ asset('storage/images/' . $order->img) }}" class="product-img-card" alt="Plantita Image">
                            <h5>{{ $order->itemdesc }}</h5>
                            <p>Seller: {{ $order->first_name . ' ' . $order->last_name }}</p>
                            <p>Price: ₱{{ $order->itemprice }}</p>
                            <p>Gcash Number: {{ $order->gcash_no }}</p>
                            <div class="mb-3">
                                <label for="gcashRef" class="form-label">Enter Gcash Reference No.</label>
                                <input type="text" name="gcash[]" value="{{ old('gcash')[$loop->index] ?? '' }}"
                                    class="form-control" id="gcashRef">

                                @error('gcash')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Enter Amount</label>
                                <input type="text" name="amount[]" value="{{ old('amount')[$loop->index] ?? '' }}"
                                    class="form-control" id="gcashRef">

                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <div class="text-center total-price">
                Total Price: @foreach ($sum as $total)
                ₱{{ $total->totalprice }}
                @endforeach
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-lg" value="Order">
                <a href="/customerMarketplace" class="btn btn-danger btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php

}

?>
