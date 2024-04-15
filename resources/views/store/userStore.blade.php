<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-store</title>
</head>

<body>
    {{-- <h1>{{ $storeData->toArray() }}</h1> --}}

    <h1>{{ $storeData->toArray()[0]['store_name'] }}</h1>
    <img src="{{ $storeData->toArray()[0]['img'] }}" alt="">
    <p>{{ $storeData->toArray()[0]['description'] }}</p>
</body>

</html>
