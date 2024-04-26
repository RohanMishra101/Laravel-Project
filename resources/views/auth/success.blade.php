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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-custom {
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    {{-- <main>
        <h1>Sing Up Sucesssfull!!</h1>
        <form method="get" action="{{ route('e_store-login') }}">
            <button>Continue</button>
        </form>
    </main> --}}

    <main>
        <section>
            <div class="container full-screen-center ">
                <div>
                    <h1 class="text-center mb-3">Sing Up Sucesssfull!!</h1>


                    <div class="text-center">

                        <a class="btn btn-primary btn-custom" href="{{ route('e_store-login') }}">Login</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
