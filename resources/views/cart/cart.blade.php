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
    {{-- @foreach ($cartDetails as $details)
    @php
        $orderNo[] = $details->no_of_orders;
    @endphp 
    @endforeach
    @php
        $i=0;
    @endphp --}}
    {{-- <p>{{dd($orderNo)}}</p> --}}
    {{-- <p>{{dd($cartDetails)}}</p> --}}
    <div class="container custom-product-list border border-dark rounded-4">
        @foreach ($categories as $category)
            @php
                $categoryProducts = $cartItems->where('c_id', $category->id);
            @endphp
            @if($categoryProducts->isNotEmpty())
            <div class="container mt-5" style="margin-bottom: 20px">
                <div class="row border border-dark rounded-3">
                    <div class=" p-3">
                        <h2>{{ $category->c_name }}</h2>
                        <hr class="w-100">
                    </div>
                    {{-- <p>{{dd($cartItems)}}</p> --}}
                    @foreach ($categoryProducts as $product)
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img src="{{ asset($product->p_img) }}"
                                class=" border border-light rounded card-img-top custom-card-img"
                                alt="{{ $product->p_name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->p_name }}</h5>
                                    <p class="card-text">{{ $product->p_description }}</p>
                                    <p class="card-text"><small class="text-muted">Price:
                                            ${{ $product->p_price }}</small></p>
                                    @foreach ($cartDetails as $details)
                                    @if($details->product_id== $product->id)
                                        <p class="card-text"><small class="text-muted">No. Of Orders:{{ $details->no_of_orders}}</small></p>
                                        @if($details['order_confirm']==0)
                                        <form action="/cartItemConfirm/{{ $details['id'] }}" method="post" style="display: inline">
                                            @csrf
                                            <button type="submit" id="showConfirm-{{ $details['order_confirm'] }}"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditItemModal">Confirm</button>
                                        </form>
                                        @endif
                                        <button type="submit" id="showDeleteForm-{{ $details['id'] }}" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#EditItemModal">Delete</button>
                                        <div id="hiddenDeleteForm-{{ $details['id'] }}" style="display: none">
                                            <form action="/cartItemDelete/{{ $details['id'] }}" method="post">
                                                @csrf()
                                                <p>Are you sure you want to remove this from cart?</p>
                                                <button type="submit">Yes</button>
                                                <button type="button" onclick="showForm('hiddenDeleteForm-{{ $details['id'] }}')">No</button>
                                            </form>
                                        </div>
                                        {{-- <p>{{ $details['id'] }}</p> --}}
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- @php
                            $i++;
                        @endphp --}}
                    @endforeach
                </div>
            </div>
            @else
            {{-- <p>No products found in this category.</p> --}}
            @endif
        @endforeach
    </div>
    <script>

        document.querySelectorAll("[id^='showDeleteForm-']").forEach(function(button) {
            button.addEventListener("click", function() {
                var productId = this.id.split("-")[1];
                showForm("hiddenDeleteForm-" + productId);
            });
        });

        function showForm(a) {
            var div = document.getElementById(a);
            div.style.display = (div.style.display === "none") ? "block" : "none";
        }

    </script>
</body>
</html>