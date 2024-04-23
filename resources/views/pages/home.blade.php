<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-store</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
    <main>
        {{-- Nav section --}}
        <section title="nav-section" class="bg-light">
            <nav class="container navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid px-5">
                    <!-- Logo on the left -->
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/e-store-logo.png') }}" alt="Logo" style="height: 100px;">
                    </a>
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

        {{-- Carousel Section --}}
        <section title="carousel-section">
            <div id="carouselExampleDark" class="container carousel carousel-dark slide custom-border mt-5">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active custom-size" data-bs-interval="10000">
                        <img src="{{ asset('images/image1.png') }}" class="d-block w-100 custom-img"
                            alt="Advertisement 1">
                        <div class="carousel-caption d-none d-md-block custom-bg">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item custom-size" data-bs-interval="2000">
                        <img src="{{ asset('images/image2.png') }}" class="d-block w-100 custom-img"
                            alt="Advertisement 2">
                        <div class="carousel-caption d-none d-md-block custom-bg">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item custom-size">
                        <img src="{{ asset('images/image3.png') }}" class="d-block w-100 custom-img"
                            alt="Advertisement 3">
                        <div class="carousel-caption d-none d-md-block custom-bg">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        {{-- Body Section --}}
        <section title="body-section">
            <div class="container mt-5 ">
                <div class="row">
                    <!-- Categories Section -->
                    {{-- <div class="col-md-3 col-12">
                        <div class="categories-section custom-border">
                            <!-- Categories List -->
                            <h1 class="text-center fs-5">Category</h1>
                            <hr class="custom-hr mb-3">
                            <ul>
                                @foreach ($categories as $item)
                                    <li class="list-group-item mt-3 ">
                                        <a class="custom-style" href="#">
                                            {{ $item->c_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                    <!-- Items Section -->
                    <div class="col-12 ">
                        <div class="container items-section custom-border p-2">
                            <!-- Search Bar -->
                            <div class="input-group custom-search mb-3">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append ">
                                    <button class="btn btn-outline-secondary " type="button">Q</button>
                                </div>
                            </div>
                            <!-- Items List -->
                            <div class="container mt-2">
                                @foreach ($store as $item)
                                    <div class="card mb-4">
                                        <div class="card-header nav justify-content-between d-flex flex-wrap">
                                            <h1>{{ $item->store_name }}</h1>
                                            <a href="{{ route('e_store-storePage', $item->store_name) }}"
                                                target="_blank"
                                                class="btn btn-primary text-center btn-sm align-self-center p-2">Visit
                                                Store</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($item->products->take(4) as $product)
                                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                                        <div class="card h-100 d-flex flex-column">
                                                            <img src="{{ asset($product->p_img) }}"
                                                                class="card-img-top" alt="Product Image"
                                                                style="height: 150px; object-fit: cover;">
                                                            <div class="card-body d-flex flex-column">
                                                                <h6 class="card-title">{{ $product->p_name }}</h6>
                                                                <p class="card-text mb-6 overflow-hidden"
                                                                    style="height: 50px;">
                                                                    {{ $product->p_description }}</p>
                                                                <ul class="list-unstyled mt-auto mb-auto">
                                                                    <li>Price: रु{{ $product->p_price }}</li>
                                                                    <li>Stock: {{ $product->p_stock }}</li>
                                                                </ul>
                                                                {{-- <form
                                                                    action="/orderCreate/{{ $product->id }}/{{ $item->store_name }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <label>No.of Orders:</label>
                                                                    <input type="number" name="NoOfOrder"
                                                                        id="NoOfOrder" style="width: 100px">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#EditItemModal">
                                                                        Add to cart
                                                                    </button>
                                                                </form> --}}

                                                                <form
                                                                    action="/orderCreate/{{ $product->id }}/{{ $item->store_name }}"
                                                                    method="post"
                                                                    class="row align-items-center w-100">
                                                                    @csrf
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="col-9">
                                                                            <input type="number" name="NoOfOrder"
                                                                                id="NoOfOrder{{ $product->id }}"
                                                                                class="form-control"
                                                                                placeholder="Enter quantity">
                                                                            @error('NoOfOrder')
                                                                                <p>{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <button type="submit"
                                                                                class="btn btn-primary d-flex justify-content-center align-items-center"
                                                                                style="width: 60px; height: 37px;">
                                                                                <img src="{{ asset('images/add-to-cart.png') }}"
                                                                                    alt="Add-to-cart"
                                                                                    style="width: 20px; height: 20px;">
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>




                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    {{-- <div class="col-12">
                        <div class="container items-section custom-border p-3">
                            <!-- Reduced padding for smaller screens -->
                            <!-- Search Bar -->
                            <div class="input-group custom-search mb-3">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Q</button>
                                </div>
                            </div>
                            <!-- Items List -->
                            <div class="container mt-2"> <!-- Reduced top margin for smaller screens -->
                                @foreach ($store as $item)
                                    <div class="card mb-3"> <!-- Reduced margin-bottom for smaller screens -->
                                        <div class="card-header nav justify-content-between d-flex flex-wrap">
                                            <!-- Added flex-wrap -->
                                            <h5 class="flex-grow-1">{{ $item->store_name }}</h5>
                                            <!-- Reduced size for smaller screens -->
                                            <a href="{{ route('e_store-storePage', $item->store_name) }}"
                                                target="_blank" class="btn btn-primary btn-sm align-self-center">Visit
                                                Store</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($item->products->take(4) as $product)
                                                    <div class="col-md-6 col-sm-12 mb-3">
                                                        <!-- Adjusted for better mobile responsiveness -->
                                                        <div class="card h-100 d-flex flex-column">
                                                            <img src="{{ asset($product->p_img) }}"
                                                                class="card-img-top" alt="Product Image"
                                                                style="height: 150px; object-fit: cover;">
                                                            <div class="card-body d-flex flex-column">
                                                                <h6 class="card-title">{{ $product->p_name }}</h6>
                                                                <p class="card-text">{{ $product->p_description }}</p>
                                                                <ul class="list-unstyled mt-auto">
                                                                    <li>Price: ${{ $product->p_price }}</li>
                                                                    <li>Stock: {{ $product->p_stock }}</li>
                                                                </ul>
                                                                <form
                                                                    action="/orderCreate/{{ $product->id }}/{{ $item->store_name }}"
                                                                    method="post" class="d-flex flex-column">
                                                                    @csrf
                                                                    <div class="input-group mb-2">
                                                                        <label for="NoOfOrder"
                                                                            class="form-label pe-2">No. of
                                                                            Orders:</label>
                                                                        <input type="number" name="NoOfOrder"
                                                                            id="NoOfOrder" class="form-control"
                                                                            style="max-width: 100px;">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Add
                                                                        to cart</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </section>
    </main>

    <script script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </script>
</body>

</html>
