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
        .full-screen-center {
            height: 100vh;
            /* Full height */
            display: flex;
            align-items: center;
            /* Center vertically */
            justify-content: center;
            /* Center horizontally */
        }

        .border-custom {
            border-width: 2px;
            /* Custom border width */
        }

        .btn-custom {
            padding: 10px 20px;
            /* Larger button padding */
            font-size: 16px;
            /* Larger text for buttons */
        }

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
        <section title="body section">
            @if (session()->has('user'))
                @if ($hasStore)
                    <div class="container full-screen-center border border-dark border-custom">
                        <h1 class="text-center mb-3">
                            You have already created a store
                        </h1>
                        <a class="btn btn-primary btn-custom" href="{{ route('e_store-dashboard') }}">
                            Visit Dashboard
                        </a>
                    </div>
                @else
                    {{-- <div class="container full-screen-center d-flex flex-column">
                        <h1 class="text-center mb-3">Create You Store</h1>
                        <hr class="custom-hr mb-3">
                        <div class="container custom-border p-4 mt-3">
                            <form method="POST" action="{{ route('e_store-storeCreation') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group border border-dark d-flex justify-content-around">
                                    <div class="form-group border border-dark w-50 ">
                                        <div>
                                            <input class="form-control" type="text" name="store_name"
                                                placeholder="Store Name" required>
                                        </div>
                                        <div>
                                            <textarea id="storeDescription" name="description" placeholder="Enter store description here..." required rows="4"
                                                cols="30"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex flex-column p-3">
                                        <div class="custom-img-div">
                                            <img class="custom-img" id="uploadedImage"
                                                src="{{ asset('images/store.png') }}" alt="Uploaded Image Preview"
                                                width="300px" height="300px">
                                        </div>
                                        <input type="file" name ="image" id="fileInput" accept="image/*"
                                            style="display: none;">
                                        <input class="btn btn-primary" type="button" value="Upload Logo"
                                            onclick="document.getElementById('fileInput').click();" required>
                                    </div>

                                </div>

                                <input type="email" placeholder="Store Email" name="email"
                                    value="{{ session()->get('user')->email }}" disabled>
                                <input type="number" name="contact_no" placeholder="Phone Number" required>
                                <input type="text" name="address" placeholder="Physical Address" required>




                                <button type="submit">Create Store</button>
                            </form>
                        </div>
                    </div> --}}
                    <div class="container d-flex justify-content-center align-items-center min-vh-100">
                        <div class="text-center p-4 w-100">
                            <div class="custom-border p-5">
                                <h1 class="mb-3">Create Your Store</h1>
                                <hr class="custom-hr mb-5">
                                <form method="POST" action="{{ route('e_store-storeCreation') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="store_name" class="form-control mb-3"
                                                placeholder="Store Name" required>
                                            <textarea id="storeDescription" name="description" class="form-control mb-3"
                                                placeholder="Enter store description here..." required rows="4"></textarea>
                                            <input type="email" class="form-control mb-3" placeholder="Store Email"
                                                name="email" value="{{ session()->get('user')->email }}" disabled>
                                            <input type="number" class="form-control mb-3" name="contact_no"
                                                placeholder="Phone Number" required>
                                            <input type="text" class="form-control mb-3" name="address"
                                                placeholder="Physical Address" required>
                                        </div>
                                        <div class="col-md-6 d-flex flex-column align-items-center">
                                            <div class="custom-img-div mb-3">
                                                <img id="uploadedImage" src="{{ asset('images/store.png') }}"
                                                    class="custom-img" alt="Uploaded Image Preview">
                                            </div>
                                            <input type="file" name="image" id="fileInput" accept="image/*"
                                                style="display: none;">
                                            <button class="btn btn-primary custom-primary-btn-color" type="button"
                                                onclick="document.getElementById('fileInput').click();">Upload
                                                Logo</button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3">Create Store</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- Main Body Div --}}
            @else
                <section>
                    <div class="container full-screen-center border border-dark border-custom">
                        <div>
                            <h1 class="text-center mb-3">Seems like you haven't logged in!
                                Please login first.</h1>
                            <div class="text-center">
                                <a class="btn btn-primary btn-custom" href="{{ route('e_store-login') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

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
    </script>
</body>

</html>
