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

        .custom-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: contain;
        }

        .custom-hover {
            cursor: pointer;
            height: 40vh;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body>

    <main>
        <section title="nav-section" class="bg-light">
            <nav class="container navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid px-5">
                    <!-- Logo on the left -->
                    <a class="navbar-brand" href="{{ route('e_store-storePage', $store->store_name) }}">
                        {{-- src="{{ asset('images/e-store-logo.png') }}"  --}}
                        <img src="{{ asset($store->img) }}" alt="Logo" class="custom-logo">
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
                                    <li><a class="dropdown-item" href="{{ route('e_store-Home') }}">Home</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('e_store-logout') }}">Log Out</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>


        </section>
        <section title="dashboard-section">
            <div>
                {{-- Body Div --}}
                <div class="container p-4 border border-dark rounded-4">
                    <div class="row d-flex justify-content-center">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <a href="{{ route('e_store-listSentOrder') }}" class="text-decoration-none custom-hover">
                                <div class="card border border-light rounded-5 p-5 custom-card h-100"
                                    style="background-color: rgb(230, 44, 44)">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <h1 class="text-center text-white">Completed Orders</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <a href="{{ route('e_store-listConfirmOrder') }}"
                                class="text-decoration-none custom-hover">
                                <div class="card border border-light rounded-5 p-5 custom-card h-100"
                                    style="background-color: rgb(35, 38, 237)">
                                    <div
                                        class="card-body d-flex align-items-center justify-content-center text-white text-center">
                                        <h1>Pending Orders</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                {{-- Add Product UI --}}
                <div class="container mt-5 p-3 border border-dark rounded-4">
                    <div class="card border border-0" style="width: 18rem;">
                        <div class="card-body p-3 add-item">
                            <button type="button" class="p-5 bg-transparent border border-dark rounded-3"
                                data-bs-toggle="modal" data-bs-target="#addItemModal">
                                <img src="{{ asset('images/add.png') }}" alt="Add Icon">
                            </button>
                        </div>

                        {{-- Pop up --}}

                        <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Add Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('e_store-addProduct') }}" method="post"
                                            class="needs-validation" enctype="multipart/form-data" novalidate>
                                            @csrf()

                                            <div class="mb-3">
                                                <label for="p_name" class="form-label">Product
                                                    Name</label>
                                                <input type="text" class="form-control" id="p_name"
                                                    name="p_name" required>
                                                <div class="invalid-feedback">
                                                    Please provide a product name.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="p_img" class="form-label">Product
                                                    Image</label>
                                                <input type="file" class="form-control" id="p_img"
                                                    name="p_img" required>
                                                <div class="invalid-feedback">
                                                    Please provide an image.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="p_description" class="form-label fs-5">Product
                                                    Description</label>
                                                <textarea class="form-control" name="p_disc" id="p_disc" rows="10"></textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a description.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="p_price" class="form-label">Product
                                                    Price</label>
                                                <input type="number" class="form-control" id="p_price"
                                                    name="p_price" required>
                                                <div class="invalid-feedback">
                                                    Please provide a price.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="p_stock" class="form-label">Product
                                                    Stock</label>
                                                <input type="number" class="form-control" id="p_stock"
                                                    name="p_stock" required>
                                                <div class="invalid-feedback">
                                                    Please enter the stock quantity.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="category" class="form-label">Product
                                                    Category</label>
                                                <select class="form-select" id="category" name="p_category"
                                                    required>
                                                    <option value="" disabled selected>Select a
                                                        category</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item['id'] }}">
                                                            {{ $item['c_name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a category.
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Listing Products --}}
                <div>
                    @foreach ($categories as $category)
                        @php
                            $categoryProducts = $productsByCategory[$category->id] ?? collect();
                        @endphp

                        @if ($categoryProducts->isNotEmpty())
                            <div class="container mt-5 mb-2">
                                <div class="row border border-dark rounded-3">
                                    <div class="p-3">
                                        <h2>{{ $category->c_name }}</h2>
                                        <hr class="w-100">
                                    </div>
                                    @foreach ($categoryProducts as $product)
                                        <div class="col-md-3">
                                            <div class="card mb-4">
                                                <img src="{{ asset($product->p_img) }}"
                                                    class="border border-light rounded card-img-top custom-card-img"
                                                    alt="{{ $product->p_name }}">
                                                <div class="card-body">
                                                    {{-- <h5>{{ $product->id }}</h5> --}}
                                                    <h5 class="card-title">{{ $product->p_name }}</h5>
                                                    <p class="card-text">{{ $product->p_description }}
                                                    </p>
                                                    <p class="card-text">
                                                        <small class="text-muted">Price:
                                                            ${{ $product->p_price }}
                                                        </small>
                                                    </p>
                                                    <p class="card-text">
                                                        <small class="text-muted">Stock:
                                                            {{ $product->p_stock }}
                                                        </small>
                                                    </p>


                                                    {{-- Edit Btn --}}
                                                    <div class="d-flex justify-content-around ">
                                                        <a href="{{ route('e_store-editStore', $product->id) }}"
                                                            class="btn btn-primary w-100 m-1">Edit</a>
                                                        <form method="POST"
                                                            action="{{ route('e_store-deleteProduct', $product->id) }}">
                                                            @csrf
                                                            <button class="btn btn-danger w-100 m-1">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the file from the input
            if (file) {
                const reader = new FileReader(); // Create a FileReader
                reader.onload = function(e) {
                    const imgElement = document.getElementById('productImage'); // Select the image element
                    imgElement.src = e.target.result; // Set the src to the file content
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            }
        });
    </script>
    {{-- <script>
        document.getElementById("showAddItemForm").addEventListener("click", function() {
            //   var div = document.getElementById("hiddenDiv");
            //   div.style.display = (div.style.display === "none") ? "block" : "none"; 
            // showForm("hiddenDiv");
        });
        document.querySelectorAll("[id^='showEditForm-']").forEach(function(button) {
            button.addEventListener("click", function() {
                var productId = this.id.split("-")[1];
                showForm("hiddenEditForm-" + productId);
            });
        });

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
    </script> --}}
</body>

</html>
