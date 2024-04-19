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
</head>

<body>

    <main>
        <section title="sidebar-section">
            <div>
                {{-- Header Div --}}
                <nav class="navbar bg-body-tertiary fixed-top">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Offcanvas navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Link</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <form class="d-flex mt-3" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
        <section title="dashboard-section">
            <div>
                {{-- Body Div --}}

                <div class="container mt-5">
                    <div class="row">
                        <!-- Card 1  -->
                        <div class="col-md-4 mt-5">
                            <div class="card border border-dark p-5 custom-card">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h1>Card 1</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4 mt-5">
                            <div class="card border border-dark p-5 custom-card">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h1>Card 2</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="col-md-4 mt-5">
                            <div class="card border border-dark p-5 custom-card">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h1>Card 3</h1>
                                </div>
                            </div>
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
                                                <label for="p_name" class="form-label">Product Name</label>
                                                <input type="text" class="form-control" id="p_name"
                                                    name="p_name" required>
                                                <div class="invalid-feedback">
                                                    Please provide a product name.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="p_img" class="form-label">Product Image</label>
                                                <input type="file" class="form-control" id="p_img"
                                                    name="p_img" required>
                                                <div class="invalid-feedback">
                                                    Please provide an image.
                                                </div>
                                            </div>

                                            {{-- <div class="mb-3">
                                                <label for="p_disc" class="form-label">Product Description</label>
                                                <textarea name="p_disc" id="p_disc" cols="30" rows="10" required></textarea>
                                                <input type="text" class="form-control" id="p_disc"
                                                    name="p_disc" required>
                                                <div class="invalid-feedback">
                                                    Please provide a description.
                                                </div>
                                            </div> --}}

                                            <div class="mb-3">
                                                <label for="p_description" class="form-label fs-5">Product
                                                    Description</label>
                                                <textarea class="form-control" name="p_disc" id="p_disc" rows="10"></textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a description.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="p_price" class="form-label">Product Price</label>
                                                <input type="number" class="form-control" id="p_price"
                                                    name="p_price" required>
                                                <div class="invalid-feedback">
                                                    Please provide a price.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="p_stock" class="form-label">Product Stock</label>
                                                <input type="number" class="form-control" id="p_stock"
                                                    name="p_stock" required>
                                                <div class="invalid-feedback">
                                                    Please enter the stock quantity.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="category" class="form-label">Product Category</label>
                                                <select class="form-select" id="category" name="p_category"
                                                    required>
                                                    <option value="" disabled selected>Select a category</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['c_name'] }}
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
                {{-- <div>
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
                                        <div class="col-md-3">
                                            <div class="card mb-4"> <!-- Increased margin for better spacing -->
                                                <img src="{{ asset($product->p_img) }}"
                                                    class=" border border-light rounded card-img-top custom-card-img"
                                                    alt="{{ $product->p_name }}">
                                                <div class="card-body">
                                                    <h5>{{ $product->id }}</h5>
                                                    <h5 class="card-title">{{ $product->p_name }}</h5>
                                                    <p class="card-text">{{ $product->p_description }}</p>
                                                    <p class="card-text"><small class="text-muted">Price:
                                                            ${{ $product->p_price }}</small></p>
                                                    <p class="card-text"><small class="text-muted">Stock:
                                                            {{ $product->p_stock }}</small></p>

                                                    <a href="" type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#EditItemModal"">
                                                        Edit
                                                    </a>

                                                    <div class="modal fade" id="EditItemModal" tabindex="-1"
                                                        aria-labelledby="modalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalLabel">Edit Item
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('e_store-editProduct', $product->id) }}"
                                                                        method="post" class="needs-validation"
                                                                        enctype="multipart/form-data" novalidate>
                                                                        @csrf()

                                                                        <div class="mb-3">
                                                                            <label for="p_name"
                                                                                class="form-label">Product Name</label>
                                                                            <input type="text" class="form-control"
                                                                                id="p_name" name="p_name"
                                                                                value="{{ $product->id }}" required>
                                                                            <div class="invalid-feedback">
                                                                                Please provide a product name.
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="p_img"
                                                                                class="form-label">Product
                                                                                Image</label>
                                                                            <input type="file" class="form-control"
                                                                                id="p_img" name="p_img"
                                                                                required>
                                                                            <div class="invalid-feedback">
                                                                                Please provide an image.
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="p_disc"
                                                                                class="form-label">Product
                                                                                Description</label>
                                                                            <input type="text" class="form-control"
                                                                                id="p_disc" name="p_disc"
                                                                                value="{{ $product->p_description }}"
                                                                                required>
                                                                            <div class="invalid-feedback">
                                                                                Please provide a description.
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="p_price"
                                                                                class="form-label">Product
                                                                                Price</label>
                                                                            <input type="number" class="form-control"
                                                                                id="p_price" name="p_price"
                                                                                value="{{ $product->p_price }}"
                                                                                required>
                                                                            <div class="invalid-feedback">
                                                                                Please provide a price.
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="p_stock"
                                                                                class="form-label">Product
                                                                                Stock</label>
                                                                            <input type="number" class="form-control"
                                                                                id="p_stock" name="p_stock"
                                                                                value="{{ $product->p_stock }}"
                                                                                required>
                                                                            <div class="invalid-feedback">
                                                                                Please enter the stock quantity.
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="category"
                                                                                class="form-label">Product
                                                                                Category</label>
                                                                            <select class="form-select" id="category"
                                                                                name="p_category" required>

                                                                                <option>
                                                                                    {{ $category->c_name }}
                                                                                </option>
                                                                                @foreach ($categories as $item)
                                                                                    <option
                                                                                        value="{{ $item['id'] }}">
                                                                                        {{ $item['c_name'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Please select a category.
                                                                            </div>
                                                                        </div>

                                                                        <button type="submit"
                                                                            class="btn btn-primary">Edit</button>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="button" class="btn btn-danger"
                                                        onclick="document.getElementById('hiddenDeleteForm-{{ $product->id }}').style.display='block'">
                                                        Delete
                                                    </button>
                                                    <div id="hiddenDeleteForm-{{ $product->id }}"
                                                        style="display: none" class="mt-2 text-center">
                                                        <form action="" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">Confirm
                                                                Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                        @endif
                    @endforeach
                </div> --}}

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
                                                    <p class="card-text">{{ $product->p_description }}</p>
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

                    <!-- Include modals here, outside of the loop -->
                    {{-- @include('partials.edit_modal')
                    @include('partials.delete_confirm_modal') --}}
                </div>






            </div>



        </section>
    </main>

    {{-- <div>
                    <div class="add-item">
                        <button id="showAddItemForm" type="button">Add</button>
                    </div>
                    <div id="hiddenDiv" style="display: none">
                        <form action="{{ route('e_store-addProduct') }}" method="post">
                            @csrf()
                            <label>Product Name</label>
                            <input type="text" name="p_name">
                            <label>Product Description</label>
                            <input type="text" name="p_disc">
                            <label>Product Price</label>
                            <input type="number" name="p_price">
                            <label>Product Stock</label>
                            <input type="number" name="p_stock">
                            <label>Product Category</label>
                            <select name="p_category" id="category" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['c_name'] }}</option>
                                @endforeach
                            </select>

                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div> --}}
    {{-- Product listing --}}
    {{-- <div>
        <p style="border: 5px solid black">Electronics</p>
        @foreach ($products1 as $value)
            <p>{{ $value['p_name'] }}</p>
            <p>{{ $value['p_description'] }}</p>
            <p>{{ $value['p_price'] }}</p>
            <p>{{ $value['p_stock'] }}</p>
            <button type="submit" id="showEditForm-{{ $value['id'] }}">Edit</button>
            <button type="submit" id="showDeleteForm-{{ $value['id'] }}">Delete</button>
            <div id="hiddenEditForm-{{ $value['id'] }}" style="display: none">
                <form action="/productEdit/{{ $value['id'] }}" method="post">
                    @csrf()
                    <label>Product Name</label>
                    <input type="text" name="p_name">
                    <label>Product Description</label>
                    <input type="text" name="p_disc">
                    <label>Product Price</label>
                    <input type="number" name="p_price">
                    <label>Product Stock</label>
                    <input type="number" name="p_stock">
                    <label>Product Category</label>
                    <select name="p_category" id="category" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item['id'] }}">{{ $item['c_name'] }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div id="hiddenDeleteForm-{{ $value['id'] }}" style="display: none">
                <form action="/productDelete/{{ $value['id'] }}" method="post">
                    @csrf()
                    <p>Are you sure you want to delete this item?</p>
                    <p>{{ $value['p_name'] }}</p>
                    <button type="submit">Yes</button>
                    <button type="button" onclick="showForm('hiddenDeleteForm-{{ $value['id'] }}')">No</button>
                </form>
            </div>

            <p>
                <hr>
            </p>
        @endforeach
    </div>
    <hr>
    <div>
        <p style="border: 5px solid black">Fashion</p>
        @foreach ($products2 as $value)
            <p>{{ $value['p_name'] }}</p>
            <p>{{ $value['p_description'] }}</p>
            <p>{{ $value['p_price'] }}</p>
            <p>{{ $value['p_stock'] }}</p>
            <button type="submit" id="showEditForm-{{ $value['id'] }}">Edit</button>
            <button type="submit" id="showDeleteForm-{{ $value['id'] }}">Delete</button>
            <div id="hiddenEditForm-{{ $value['id'] }}" style="display: none">
                <form action="/productEdit/{{ $value['id'] }}" method="post">
                    @csrf()
                    <label>Product Name</label>
                    <input type="text" name="p_name">
                    <label>Product Description</label>
                    <input type="text" name="p_disc">
                    <label>Product Price</label>
                    <input type="number" name="p_price">
                    <label>Product Stock</label>
                    <input type="number" name="p_stock">
                    <label>Product Category</label>
                    <select name="p_category" id="category" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item['id'] }}">{{ $item['c_name'] }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div id="hiddenDeleteForm-{{ $value['id'] }}" style="display: none">
                <form action="/productDelete/{{ $value['id'] }}" method="post">
                    @csrf()
                    <p>Are you sure you want to delete this item?</p>
                    <p>{{ $value['p_name'] }}</p>
                    <button type="submit">Yes</button>
                    <button type="button" onclick="showForm('hiddenDeleteForm-{{ $value['id'] }}')">No</button>
                </form>
            </div>

            <p>
                <hr>
            </p>
        @endforeach
    </div>
    <hr>
    <div>
        <p style="border: 5px solid black">Sports</p>
        @foreach ($products3 as $value)
            <p>{{ $value['p_name'] }}</p>
            <p>{{ $value['p_description'] }}</p>
            <p>{{ $value['p_price'] }}</p>
            <p>{{ $value['p_stock'] }}</p>
            <button type="submit" id="showEditForm-{{ $value['id'] }}">Edit</button>
            <button type="submit" id="showDeleteForm-{{ $value['id'] }}">Delete</button>
            <div id="hiddenEditForm-{{ $value['id'] }}" style="display: none">
                <form action="/productEdit/{{ $value['id'] }}" method="post">
                    @csrf()
                    <label>Product Name</label>
                    <input type="text" name="p_name">
                    <label>Product Description</label>
                    <input type="text" name="p_disc">
                    <label>Product Price</label>
                    <input type="number" name="p_price">
                    <label>Product Stock</label>
                    <input type="number" name="p_stock">
                    <label>Product Category</label>
                    <select name="p_category" id="category" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item['id'] }}">{{ $item['c_name'] }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div id="hiddenDeleteForm-{{ $value['id'] }}" style="display: none">
                <form action="/productDelete/{{ $value['id'] }}" method="post">
                    @csrf()
                    <p>Are you sure you want to delete this item?</p>
                    <p>{{ $value['p_name'] }}</p>
                    <button type="submit">Yes</button>
                    <button type="button" onclick="showForm('hiddenDeleteForm-{{ $value['id'] }}')">No</button>
                </form>
            </div>

            <p>
                <hr>
            </p>
        @endforeach
    </div>
    <hr>
    <div>
        <p style="border: 5px solid black">Food & Beverage</p>
        @foreach ($products4 as $value)
            <img src="{{ asset($value['p_img']) }}" alt="">
            <p>{{ $value['p_name'] }}</p>
            <p>{{ $value['p_description'] }}</p>
            <p>{{ $value['p_price'] }}</p>
            <p>{{ $value['p_stock'] }}</p>
            <button type="submit" id="showEditForm-{{ $value['id'] }}">Edit</button>
            <button type="submit" id="showDeleteForm-{{ $value['id'] }}">Delete</button>
            <div id="hiddenEditForm-{{ $value['id'] }}" style="display: none">
                <form action="/productEdit/{{ $value['id'] }}" method="post">
                    @csrf()
                    <label>Product Name</label>
                    <input type="text" name="p_name">
                    <label>Product Description</label>
                    <input type="text" name="p_disc">
                    <label>Product Price</label>
                    <input type="number" name="p_price">
                    <label>Product Stock</label>
                    <input type="number" name="p_stock">
                    <label>Product Category</label>
                    <select name="p_category" id="category" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item['id'] }}">{{ $item['c_name'] }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div id="hiddenDeleteForm-{{ $value['id'] }}" style="display: none">
                <form action="/productDelete/{{ $value['id'] }}" method="post">
                    @csrf()
                    <p>Are you sure you want to delete this item?</p>
                    <p>{{ $value['p_name'] }}</p>
                    <button type="submit">Yes</button>
                    <button type="button" onclick="showForm('hiddenDeleteForm-{{ $value['id'] }}')">No</button>
                </form>
            </div>

            <p>
                <hr>
            </p>
        @endforeach
    </div>
    <hr>
    <div>
        <p style="border: 5px solid black">Toys</p>
        @foreach ($products5 as $value)
            <p>{{ $value['p_name'] }}</p>
            <p>{{ $value['p_description'] }}</p>
            <p>{{ $value['p_price'] }}</p>
            <p>{{ $value['p_stock'] }}</p>
            <button type="submit" id="showEditForm-{{ $value['id'] }}">Edit</button>
            <button type="submit" id="showDeleteForm-{{ $value['id'] }}">Delete</button>
            <div id="hiddenEditForm-{{ $value['id'] }}" style="display: none">
                <form action="/productEdit/{{ $value['id'] }}" method="post">
                    @csrf()
                    <label>Product Name</label>
                    <input type="text" name="p_name">
                    <label>Product Description</label>
                    <input type="text" name="p_disc">
                    <label>Product Price</label>
                    <input type="number" name="p_price">
                    <label>Product Stock</label>
                    <input type="number" name="p_stock">
                    <label>Product Category</label>
                    <select name="p_category" id="category" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item['id'] }}">{{ $item['c_name'] }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div id="hiddenDeleteForm-{{ $value['id'] }}" style="display: none">
                <form action="/productDelete/{{ $value['id'] }}" method="post">
                    @csrf()
                    <p>Are you sure you want to delete this item?</p>
                    <p>{{ $value['p_name'] }}</p>
                    <button type="submit">Yes</button>
                    <button type="button" onclick="showForm('hiddenDeleteForm-{{ $value['id'] }}')">No</button>
                </form>
            </div>

            <p>
                <hr>
            </p>
        @endforeach
    </div>
    <hr> --}}
    {{-- Product Listing --}}

    {{-- <p>{{ $storeId }}</p>
    <p>{{ $userId }}</p> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById("showAddItemForm").addEventListener("click", function() {
            //   var div = document.getElementById("hiddenDiv");
            //   div.style.display = (div.style.display === "none") ? "block" : "none"; 
            showForm("hiddenDiv");
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
    </script>
</body>

</html>
