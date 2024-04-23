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
        {{-- Edit Profile --}}
        <section>
            <div
                class="container min-vh-100 border border-dark d-flex flex-column justify-content-start align-items-center">
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
                                <input type="email" class="form-control mb-3 p-2" placeholder="Email" name="email"
                                    value="{{ $userData->email }}">
                                {{-- 
                                <input type="password" class="form-control" placeholder="Password" name="password">

                                <button class="btn btn-success btn-update-password">Update Password</button> --}}
                                <label for="" class="form-label text-start">Contact no. :</label>
                                <input type="text" class="form-control mb-3 p-2" placeholder="Contact" name="contact"
                                    value="{{ $userData->contact }}">

                                <label for="" class="form-label text-start">Address :</label>
                                <input type="text" class="form-control mb-3 p-2" placeholder="Address" name="address"
                                    value="{{ $userData->address }}">
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
                    <div class="col-md-10 col-sm-12">
                        <div class="text-center p-4">
                            <div class="mb-3">
                                <h1>Transaction Method</h1>
                                <hr class="custom-hr">
                            </div>
                        </div>
                        <div class="container-fluid p-4">
                            <form class="row" method="POST" action="">
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
                                <div class="col-md-6 mb-4">
                                    <input type="date" class="form-control" placeholder="Expiry Date" name="date"
                                        value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="text" class="form-control" placeholder="Address" name="address"
                                        value="">
                                </div>
                                <div class="col-12 mt-4 justify-content-center d-flex">
                                    <button class="btn btn-success col-4" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

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
    </script>


</body>

</html>
