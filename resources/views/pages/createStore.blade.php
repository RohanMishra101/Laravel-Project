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
                @if ($hasStore)
                    <h1>You have already created a store</h1>
                    <a href="{{ route('e_store-dashboard') }}">go to dashboard</a>
                @else
                    <div>
                        <h1>Create You Store</h1>
                        <div>
                            <form method="POST" action="{{ route('e_store-storeCreation') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <input type="text" name="store_name" placeholder="Store Name" required>
                                    <div>
                                        <img id="uploadedImage" src="" alt="Uploaded Image Preview">
                                    </div>
                                    <input type="file" name ="image" id="fileInput" accept="image/*"
                                        style="display: none;">
                                    <input type="button" value="Upload Logo"
                                        onclick="document.getElementById('fileInput').click();" required>

                                </div>
                                <textarea id="storeDescription" name="description" placeholder="Enter store description here..." required rows="4"
                                    cols="50"></textarea>
                                <input type="email" placeholder="Store Email" name="email"
                                    value="{{ session()->get('user')->email }}" disabled>
                                <input type="number" name="contact_no" placeholder="Phone Number" required>
                                <input type="text" name="address" placeholder="Physical Address" required>

                                


                                <button type="submit">Create Store</button>
                            </form>
                        </div>
                    </div>
                @endif
                {{-- Main Body Div --}}
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
