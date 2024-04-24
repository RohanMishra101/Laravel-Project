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

    <style>
        .custom-img-div {
            width: 300px;
            height: 300px;
            margin-bottom: 10px;
        }

        .custom-img {
            border: 5px solid black;
            border-radius: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <main>
        {{-- <section>
            <div class="container ">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form method="POST" action="" enctype="multipart/form-data" class="custom-form-container">
                            <div class="form-group text-center d-flex justify-content-center">
                                <div>
                                    <img src="{{ asset($userData->img ?? 'images/profile.png') }}" alt="Profile Image"
                                        class="img-circle" style="width: 150px; height: 150px;">
                                </div>
                                <input id="file-upload" type="file" name="image" />
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="User Name" name="username"
                                    value="{{ $userData->username }}">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ $userData->email }}">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success btn-update-password">Update Password</button>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Contact" name="contact"
                                    value="{{ $userData->contact }}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address" name="address"
                                    value="{{ $userData->address }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-save">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section> --}}
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
        {{-- Edit Profile --}}
        <section>
            <div class="container min-vh-100 d-flex flex-column justify-content-start align-items-center">
                <div class="text-center p-4 w-100">
                    <div class="custom-border p-5 mb-5">
                        <h1 class="mb-3">{{ $userData->username }}'s Profile</h1>
                        <hr class="custom-hr">
                    </div>
                    <form method="POST" action="{{ route('e_store-updateProfile', $userData->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 d-flex flex-column align-items-center">
                                @if ($userData->img == !null)
                                    <div class="custom-img-div mb-3">
                                        <img src="{{ asset($userData->img) }}" alt="{{ $userData->img }}"
                                            class="custom-img" id="uploadedImage">
                                    </div>
                                @else
                                    <div class="custom-img-div mb-3">
                                        <img src="{{ asset('images/profile.png') }}" alt="" class="custom-img"
                                            id="uploadedImage">
                                    </div>
                                @endif
                                <input class="form-control mt-auto w-50" type="file" name="img" id="fileInput">

                                {{-- <button class="btn btn-success custom-primary-btn-color" type="button"
                                    onclick="document.getElementById('fileInput').click();">
                                    Upload Profile Image
                                </button> --}}
                            </div>
                            <div class="col-md-5 d-flex flex-column justify-content-center ">

                                <label for="" class="form-label text-start">Username :</label>
                                <input type="text" class="form-control mb-3 p-2" placeholder="User Name"
                                    name="username" value="{{ $userData->username }}">
                                <label for="" class="form-label text-start">Email :</label>
                                <input type="email" class="form-control mb-3 p-2" placeholder="Email"
                                    name="email" value="{{ $userData->email }}">
                                {{-- 
                                <input type="password" class="form-control" placeholder="Password" name="password">

                                <button class="btn btn-success btn-update-password">Update Password</button> --}}
                                <label for="" class="form-label text-start">Contact no. :</label>
                                <input type="text" class="form-control mb-3 p-2" placeholder="Contact"
                                    name="contact" value="{{ $userData->contact }}">

                                <label for="" class="form-label text-start">Address :</label>
                                <input type="text" class="form-control mb-3 p-2" placeholder="Address"
                                    name="address" value="{{ $userData->address }}">
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <button class="btn btn-primary w-25 mt-5">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
                {{-- <hr class="custom-long-hr"> --}}
                <div class="custom-border col-10 d-flex flex-column align-items-center">
                    {{-- <div class="text-center p-4 w-100 mt-5">
                        <div class="mb-3">
                            <h1 class="mb-3">Transaction Method</h1>
                            <hr class="custom-hr ">
                        </div>
                    </div>
                    <div class="container-fluid  w-100 p-5">
                        <form class="col-12" method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="container d-flex flex-column align-items-center justify-content-center">
                                    <div class="container w-100 mb-4">
                                        <div class="form-group col-md-5">
                                            <input type="text" class="form-control" placeholder="Name" name="name"
                                                value="" required>
                                        </div>
                                    </div>
                                    <div class="container d-flex justify-content-between mb-3">
                                        <div class="form-group col-md-5 ">
                                            <input type="number" class="form-control" placeholder="Card No."
                                                name="cardNo" value="">
                                        </div>
                                        make sure to make it only 3 numbers
                                        <div class="form-group col-md-5 ">
                                            <input type="number" class="form-control" placeholder="CVV" name="cvv"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="container d-flex justify-content-between mb-5">
                                        <div class="form-group col-md-5">
                                            <input type="date" class="form-control" placeholder="expiry date"
                                                name="date" value="">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <input type="text" class="form-control" placeholder="Address"
                                                name="address" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center ">
                                <button class="btn btn-success col-3 fs-5">
                                    Save
                                </button>
                            </div>
                        </form>

                    </div> --}}
                    @if ($transactionMethod != null)
                        <h1>Transaction Method exists</h1>
                        <button id="updateButton">Update</button>
                        <div class="container-fluid p-4" style="display: none;" id="updateFormContainer">
                            <form class="row" method="POST"
                                action="/transactionMethodUpdate/{{ $userData->id }}">
                                @csrf
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <input type="text" class="form-control" placeholder="Name" name="name"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="number" class="form-control" placeholder="Card No." name="cardNo"
                                        value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="number" class="form-control" placeholder="CVV" name="cvv"
                                        value="">
                                </div>
                                <div class="col-12 mt-4 justify-content-center d-flex">
                                    <button class="btn btn-success col-4" type="submit">Save</button>
                                </div>
                            </form>
                        @else
                            <div class="col-md-10 col-sm-12">
                                <div class="text-center p-4">
                                    <div class="mb-3">
                                        <h1>Transaction Method</h1>
                                        <hr class="custom-hr">
                                    </div>
                                </div>
                                <div class="container-fluid p-4">
                                    <form class="row" method="POST"
                                        action="/transactionMethod/{{ $userData->id }}">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <input type="text" class="form-control" placeholder="Name"
                                                    name="name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input type="number" class="form-control" placeholder="Card No."
                                                name="cardNo" value="">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input type="number" class="form-control" placeholder="CVV"
                                                name="cvv" value="">
                                        </div>

                                        {{-- <div class="col-md-6 mb-4">
                                            <input type="date" class="form-control" placeholder="Expiry Date"
                                                name="date" value="">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input type="text" class="form-control" placeholder="Address"
                                                name="address" value="">
                                        </div> --}}

                                        <div class="col-12 mt-4 justify-content-center d-flex">
                                            <button class="btn btn-success col-4" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    @endif
                </div>
            </div>


        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('uploadedImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById('updateButton').onclick = function() {
            var formContainer = document.getElementById('updateFormContainer');
            if (formContainer.style.display === 'none') {
                formContainer.style.display = 'block';
            } else {
                formContainer.style.display = 'none';
            }
        };
    </script>


</body>

</html>
