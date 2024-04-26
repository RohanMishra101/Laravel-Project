<!DOCTYPE html>
<html>

<head>
    <title>Login & Signup Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> --}}

    {{-- <link rel="stylesheet" type="text/css" href="style.css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body,
        html {
            height: 100%;
        }

        /* .container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        } */

        .btn-custom {
            background-color: #38AEE0;
            color: white;
            border: white 2px solid;
            transition: all 200ms ease-in-out;
        }

        .btn-custom:hover {
            color: #38AEE0;
            border: #38AEE0 2px solid;
            transition: all 200ms ease-in-out;
        }

        /* Additional styles to ensure any error message or info text stands out */
        span {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>


<body>
    <main>
        {{-- <section title="auth-section">
            <div class="cont">
                <form method="post" action="{{ route('e_store-updatePassword') }}">
                    @csrf
                    <div class="form sign-in">
                        <h2>Forgot Password</h2>
                        <label>
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @if (session('emailMessage'))
                                <span>{{ session('emailMessage') }}</span>
                            @endif
                        </label>
                        <label>
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="password" name="forgotPassword" placeholder="Confirm Password" required>
                            @if (session('message'))
                                <span>{{ session('message') }}</span>
                            @endif
                        </label>
                        <button class="submit" type="submit">Update Password</button>
                    </div>
                </form>

            </div>
        </section> --}}

        <section title="authh-section">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <section title="auth-section" class="mt-5">
                            <div class="cont">
                                <form method="post" action="{{ route('e_store-updatePassword') }}"
                                    class="p-4 border rounded">
                                    @csrf
                                    <h2 class="mb-5 text-center">Forgot Password</h2>
                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            value="{{ old('email') }}">
                                        @if (session('emailMessage'))
                                            <span>{{ session('emailMessage') }}</span>
                                        @endif 
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" class="form-control" name="forgotPassword"
                                            placeholder="Confirm Password" required>
                                        @if (session('message'))
                                            <span>{{ session('message') }}</span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-custom text-center" type="submit">Update
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
