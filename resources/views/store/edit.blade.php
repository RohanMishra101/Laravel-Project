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
        <div class="container mt-4">
            <div class="row">
                <div class="col-12 mb-5">
                    <h1 class="text-center">Edit Product</h1>
                    <hr class="custom-hr">
                </div>
            </div>
            <form method="POST" action="{{ route('e_store-editProduct', $product->id) }}" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="row p-4 custom-border">
                    <!-- Image section on the left -->
                    <div class="col-md-6 d-flex flex-column">
                        <img src="{{ asset($product->p_img) }}" alt="Product Image" id="productImage"
                            class="img-fluid border border-light" style="width: 100%; height: 100%; object-fit: cover;">
                        <input type="file" name="p_img" class="form-control mt-auto" id="imageInput"
                            value="{{ $product->p_img }}">
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="p_name" class="form-label fs-5">Product Name</label>
                            <input type="text" class="form-control" id="p_name" name="p_name"
                                value="{{ $product->p_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="p_description" class="form-label fs-5">Product Description</label>
                            <textarea class="form-control" name="p_disc" id="p_disc" rows="10">{{ $product->p_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="p_price" class="form-label fs-5">Product Price</label>
                            <input type="number" class="form-control" id="p_price" name="p_price"
                                value="{{ $product->p_price }}">
                        </div>
                        <div class="mb-3">
                            <label for="p_stock" class="form-label fs-5">Product Stock</label>
                            <input type="number" class="form-control" id="p_stock" name="p_stock"
                                value="{{ $product->p_stock }}">
                        </div>
                        <select class="form-select" name="c_id" id="c_id" required>
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->c_id == $category->id ? 'selected' : '' }}>{{ $category->c_name }}
                                </option>
                            @endforeach
                        </select>


                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
            </form>
        </div>
        </div>
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
</body>

</html>
