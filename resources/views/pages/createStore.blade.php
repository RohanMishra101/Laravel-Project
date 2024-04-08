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
        <section title="body section">
            @if (session()->has('user'))
                {{-- Main Body Div --}}
                <div>
                    <h1>Create You Store</h1>
                    <div>
                        <form action="">
                            <div>
                                <input type="text" name="" placeholder="Store Name" required>
                                <div>
                                    <img id="uploadedImage" src="" alt="Uploaded Image Preview">
                                </div>
                                <input type="file" id="fileInput" accept="image/*" style="display: none;">
                                <input type="button" value="Upload Logo"
                                    onclick="document.getElementById('fileInput').click();" required>

                            </div>
                            <textarea id="storeDescription" name="storeDescription" placeholder="Enter store description here..." required
                                rows="4" cols="50"></textarea>
                            <input type="email" placeholder="Store Email" value="{{ session()->get('user')->email }}"
                                disabled>
                            <input type="number" placeholder="Phone Number" required>
                            <input type="text" placeholder="Physical Address" required>

                            <label for="category">Category:</label>
                            <select name="category" id="category" required>
                                <option value="" disabled selected>Select a category</option>
                                <option value="category1">Category 1</option>
                                <option value="category2">Category 2</option>
                                <option value="category3">Category 3</option>
                                <option value="category4">Category 4</option>
                                <option value="category5">Category 5</option>
                            </select>


                            <button type="submit">Create Store</button>
                        </form>
                    </div>
                </div>
            @else
                <h1>Seems like you havent logged in!! Please Login first</h1>
                <a href="{{ route('e_store-login') }}">Login</a>
            @endif

        </section>
    </main>


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
