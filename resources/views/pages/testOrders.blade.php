<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container custom-product-list border border-dark rounded-4">
           @forEach($products as $product)
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="{{ asset($product->p_img) }}"
                    class=" border border-light rounded card-img-top custom-card-img"
                    alt="{{ $product->p_name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->p_name }}</h5>
                        <p class="card-text">{{ $product->p_description }}</p>
                        <p class="card-text"><small class="text-muted">Price:${{ $product->p_price }}</small></p>
                    </div>
                </div>
            </div>
           @endforeach
    </div>
</body>
</html>