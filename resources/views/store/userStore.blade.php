<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        .custom-profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    {{-- <h1>{{ $storeData->toArray() }}</h1> --}}


    {{-- <h1>{{ $storeData->toArray()[0]['store_name'] }}</h1>

    <h1>{{ $storeData->toArray()[0]['store_name'] }}</h1>

    <img src="{{ $storeData->toArray()[0]['img'] }}" alt="">
    <p>{{ $storeData->toArray()[0]['description'] }}</p> --}}

    <main>
        {{-- navigation sectoi --}}
        <section title="Nav-Section">
            <nav class="container navbar navbar-expand-lg navbar-light  mt-0 ">
                <div class="container-fluid px-3">
                    <!-- Logo on the left -->
                    <div class="d-flex flex-md-column justify-content-center align-items-center items-md-center">
                        <a class="items-md-center" href="#" style="height: 100px; width: 100px;">
                            <img src="{{ $storeData->toArray()[0]['img'] }}"
                                alt="{{ $storeData->toArray()[0]['store_name'] }}" class="rounded-circle"
                                style="height: 100%; width: 100%;">
                        </a>
                        <p class="fs-4 fw-bold">{{ $storeData->toArray()[0]['store_name'] }}
                        </p>

                    </div>
                    <!-- Toggler for mobile view -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Navbar content -->
                    <div class="collapse navbar-collapse justify-content-end px-5" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <!-- First image -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('e_store-inCartOrder') }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="80"
                                        height="40" fill="currentColor" class="nav-svg">
                                        <path
                                            d="M4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V15H18.4433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <!-- Second image -->
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="80"
                                        height="40" fill="currentColor" class="nav-svg">
                                        <path
                                            d="M18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10V18H18V10ZM20 18.6667L20.4 19.2C20.5657 19.4209 20.5209 19.7343 20.3 19.9C20.2135 19.9649 20.1082 20 20 20H4C3.72386 20 3.5 19.7761 3.5 19.5C3.5 19.3918 3.53509 19.2865 3.6 19.2L4 18.6667V10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10V18.6667ZM9.5 21H14.5C14.5 22.3807 13.3807 23.5 12 23.5C10.6193 23.5 9.5 22.3807 9.5 21Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <!-- Dropdown menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @if (session()->has('user'))
                                        @if ($userData->img)
                                            <img src="{{ asset($userData->img) }}" alt="userProfile"
                                                class="custom-profile-img me-2">
                                        @else
                                            <img src="{{ asset('images/profile.png') }}" alt="userProfile"
                                                class="custom-profile-img me-2">
                                        @endif
                                    @else
                                        <img src="{{ asset('images/profile.png') }}" alt="userProfile"
                                            class="custom-profile-img me-2">
                                    @endif
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li class="text-center">
                                        @if (session()->has('user'))
                                            <div>
                                                <p class="p-tag">
                                                    {{ session()->get('user')->username }}
                                                </p>
                                            </div>
                                        @else
                                            <a href="{{ route('e_store-login') }}">LOG IN</a>
                                        @endif
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('e_store-userProfile') }}">View
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('e_store-storeConfirm') }}">Store</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('e_store-logout') }}">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>

        {{-- search Section --}}
        <section title="Search-Section">
            <div class="container-lg p-4 rounded custom-css">
                <form action="">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control fs-3"
                            placeholder="Search">
                        <button class="btn btn-primary fs-3" type="submit"
                            style="background-color: #38AEE0; border-color: #38AEE0;">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <section title="Products-section">
            {{-- Header --}}
            <div class="header container">
                <h1 class="text-center h1-custom-font ">Products</h1>
                <hr class="custom-hr">
            </div>
            {{-- Filter --}}
            <div class="container filter dropdown">
                <button class="btn dropdown-toggle custom-btn" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown">
                    Filter
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Option 1</a></li>
                    <li><a class="dropdown-item" href="#">Option 2</a></li>
                    <li><a class="dropdown-item" href="#">Option 3</a></li>
                    <li><a class="dropdown-item" href="#">Option 4</a></li>
                </ul>
            </div>
            {{-- Product List --}}
            <div class="container custom-product-list custom-border">
                @foreach ($categories as $category)
                    @php
                        $categoryProducts = $productData->where('c_id', $category->id);
                    @endphp
                    @if ($categoryProducts->isNotEmpty())
                        <div class="container mt-5">
                            <div class="row border border-dark rounded-3">
                                <div class=" p-3">
                                    <h2>{{ $category->c_name }}</h2>
                                    <hr class="w-100">
                                </div>
                                @foreach ($categoryProducts as $product)
                                    {{-- <p>{{$product->id}}</p> --}}
                                    <div class="col-md-3">
                                        <div class="card mb-4"> <!-- Increased margin for better spacing -->
                                            <img src="{{ asset($product->p_img) }}"
                                                class=" border border-light rounded card-img-top custom-card-img"
                                                alt="{{ $product->p_name }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->p_name }}</h5>
                                                <p class="card-text">{{ $product->p_description }}</p>
                                                <p class="card-text"><small class="text-muted">Price:
                                                        ${{ $product->p_price }}</small></p>
                                                <p class="card-text"><small class="text-muted">Stock:
                                                        {{ $product->p_stock }}</small></p>
                                                {{-- <p class="card-text"><small class="text-muted">Category:
                                                            {{ $product->c_name }}</small></p> --}}
                                                <form action="/orderCreate/{{ $product->id }}/{{ $storeName }}"
                                                    method="post">
                                                    @csrf
                                                    <label>No.of Orders:</label>
                                                    <input type="number" name="NoOfOrder" id="NoOfOrder">
                                                    <button type="submit" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#EditItemModal">
                                                        Add to cart
                                                    </button>
                                                </form>

                                                {{-- Pop up
                                                <div class="modal fade" id="EditItemModal" tabindex="-1"
                                                    aria-labelledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">Add To Card
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                {{-- <div id="hiddenEditForm-{{ $product->id }}"
                                                        style="display: none" class="mt-2">
                                                        <form action="" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Submit
                                                                Edit</button>
                                                        </form>
                                                    </div> --}}

                                                <button type="button" class="btn btn-danger"
                                                    onclick="document.getElementById('hiddenDeleteForm-{{ $product->id }}').style.display='block'">
                                                    Details
                                                </button>
                                                {{-- <div id="hiddenDeleteForm-{{ $product->id }}" style="display: none"
                                                    class="mt-2 text-center">
                                                    <form action="" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning">Confirm
                                                            Delete</button>
                                                    </form>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        {{-- <p>No products found in this category.</p> --}}
                    @endif
                @endforeach
            </div>

        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
{{-- <div class="container mt-5 border border-dark p-3">
                                <div>
                                    <h2>{{ $category->c_name }}</h2>
                                </div>
                                @foreach ($categoryProducts as $product)
                                    <div class=" border border-dark p-3">
                                        <img src="{{ asset($product->p_img) }}" alt="">
                                        <p>{{ $product->p_name }}</p>
                                        <p>{{ $product->p_description }}</p>
                                        <p>{{ $product->p_price }}</p>
                                        <p>{{ $product->p_stock }}</p>
                                        <p>{{ $product->c_name }}</p>
                                        <button type="submit" id="showEditForm-{{ $product->id }}">Edit</button>
                                        <button type="submit"
                                            id="showDeleteForm-{{ $product->id }}">Delete</button>
                                        <div id="hiddenEditForm-{{ $product->id }}" style="display: none">
                                            <form action="/productEdit/{{ $product->id }}" method="post">
                                                @csrf()
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                        <div id="hiddenDeleteForm-{{ $product->id }}" style="display: none">
                                            <form action="/productDelete/{{ $product->id }}" method="post">
                                                @csrf()
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div> --}}
