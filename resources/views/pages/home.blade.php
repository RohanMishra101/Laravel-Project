<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-store</title>
</head>

<body>
    <main>
        {{-- THis is a testing code donot touch --}}
        <h1>This is the main page for browsing products</h1>

        @if (session()->has('user'))
            <p>{{ session()->get('user')->username }}</p>
        @else
            <a href="{{ route('e_store-login') }}">CREATE ACCOUNT</a>
        @endif

        <a href="{{ route('e_store-logout') }}">Log Out</a>
        {{-- THis is a testing code donot touch --}}



        {{-- main code for this page start here --}}
        <h1>This site is under construction</h1>
        <section title="nav-section">

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
</body>

</html>
