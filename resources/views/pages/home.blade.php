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
        {{-- THis is a testing code donot touch --}}
        {{-- <h1>This is the main page for browsing products</h1>

        @if (session()->has('user'))
            <p>{{ session()->get('user')->username }}</p>
        @else
            <a href="{{ route('e_store-login') }}">CREATE ACCOUNT</a>
        @endif --}}

        {{-- <a href="{{ route('e_store-logout') }}">Log Out</a> --}}
        {{-- THis is a testing code donot touch --}}



        {{-- main code for this page start here --}}
        {{-- <h1>This site is under construction</h1> --}}
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
                                <a class="nav-link" href="#">
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('images/profile.png') }}" alt="Profile Image"
                                        style="height: 40px; width: 40px">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    {{-- <li>{{ session()->get('user')->username }}</li> --}}
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
                                    <li><a class="dropdown-item" href="#">View Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Store</a></li>
                                    <li class="custom-log"><a class="dropdown-item"
                                            href="{{ route('e_store-logout') }}">Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


        </section>
        <section title="carousel-section">

        </section>

        <section title="body-section">
            {{-- First div for categories --}}
            <div></div>

            {{-- Second div for store Listing --}}
            <div></div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
