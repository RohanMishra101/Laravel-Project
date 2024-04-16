<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-store</title>
</head>

<body>
    <div>
        <p style="border: 5px solid black">Electronics</p>
        @foreach($products1 as $value)
        <p>{{$value['p_name']}}</p>
        <p>{{$value['p_description']}}</p>
        <p>{{$value['p_price']}}</p>
        <p>{{$value['p_stock']}}</p>
        <button type="submit" id="showEditForm-{{$value['id']}}">Edit</button>
        <button type="submit" id="showDeleteForm-{{$value['id']}}">Delete</button>
        <div id="hiddenEditForm-{{$value['id']}}" style="display: none">
            <form action="/productEdit/{{$value['id']}}" method="post">
                @csrf()
                <label>Product Name</label>
                <input type="text" name="p_name">
                <label>Product Description</label>
                <input type="text" name="p_disc">
                <label>Product Price</label>
                <input type="number" name="p_price">
                <label>Product Stock</label>
                <input type="number" name="p_stock">
                <label>Product Category</label>
                <select name="p_category" id="category" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item['id']}}">{{ $item['c_name']}}</option>
                    @endforeach
                </select>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div id="hiddenDeleteForm-{{$value['id']}}" style="display: none">
            <form action="/productDelete/{{$value['id']}}" method="post">
                @csrf()
                <p>Are you sure you want to delete this item?</p>
                <p>{{$value['p_name']}}</p>
                <button type="submit">Yes</button>
                <button type="button" onclick="showForm('hiddenDeleteForm-{{$value['id']}}')">No</button>
            </form>
        </div>

        <p><hr></p>
        @endforeach
    </div>
    <hr>
    <div>
        <p style="border: 5px solid black">Fashion</p>
        @foreach($products2 as $value)
        <p>{{$value['p_name']}}</p>
        <p>{{$value['p_description']}}</p>
        <p>{{$value['p_price']}}</p>
        <p>{{$value['p_stock']}}</p>
        <button type="submit" id="showEditForm-{{$value['id']}}">Edit</button>
        <button type="submit" id="showDeleteForm-{{$value['id']}}">Delete</button>
        <div id="hiddenEditForm-{{$value['id']}}" style="display: none">
            <form action="/productEdit/{{$value['id']}}" method="post">
                @csrf()
                <label>Product Name</label>
                <input type="text" name="p_name">
                <label>Product Description</label>
                <input type="text" name="p_disc">
                <label>Product Price</label>
                <input type="number" name="p_price">
                <label>Product Stock</label>
                <input type="number" name="p_stock">
                <label>Product Category</label>
                <select name="p_category" id="category" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item['id']}}">{{ $item['c_name']}}</option>
                    @endforeach
                </select>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div id="hiddenDeleteForm-{{$value['id']}}" style="display: none">
            <form action="/productDelete/{{$value['id']}}" method="post">
                @csrf()
                <p>Are you sure you want to delete this item?</p>
                <p>{{$value['p_name']}}</p>
                <button type="submit">Yes</button>
                <button type="button" onclick="showForm('hiddenDeleteForm-{{$value['id']}}')">No</button>
            </form>
        </div>

        <p><hr></p>
        @endforeach
    </div>
    <hr>
    <div>
        <p style="border: 5px solid black">Sports</p>
        @foreach($products3 as $value)
        <p>{{$value['p_name']}}</p>
        <p>{{$value['p_description']}}</p>
        <p>{{$value['p_price']}}</p>
        <p>{{$value['p_stock']}}</p>
        <button type="submit" id="showEditForm-{{$value['id']}}">Edit</button>
        <button type="submit" id="showDeleteForm-{{$value['id']}}">Delete</button>
        <div id="hiddenEditForm-{{$value['id']}}" style="display: none">
            <form action="/productEdit/{{$value['id']}}" method="post">
                @csrf()
                <label>Product Name</label>
                <input type="text" name="p_name">
                <label>Product Description</label>
                <input type="text" name="p_disc">
                <label>Product Price</label>
                <input type="number" name="p_price">
                <label>Product Stock</label>
                <input type="number" name="p_stock">
                <label>Product Category</label>
                <select name="p_category" id="category" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item['id']}}">{{ $item['c_name']}}</option>
                    @endforeach
                </select>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div id="hiddenDeleteForm-{{$value['id']}}" style="display: none">
            <form action="/productDelete/{{$value['id']}}" method="post">
                @csrf()
                <p>Are you sure you want to delete this item?</p>
                <p>{{$value['p_name']}}</p>
                <button type="submit">Yes</button>
                <button type="button" onclick="showForm('hiddenDeleteForm-{{$value['id']}}')">No</button>
            </form>
        </div>

        <p><hr></p>
        @endforeach
    </div>
    <hr>
    <div>
        <p style="border: 5px solid black">Food & Beverage</p>
        @foreach($products4 as $value)
        <p>{{$value['p_name']}}</p>
        <p>{{$value['p_description']}}</p>
        <p>{{$value['p_price']}}</p>
        <p>{{$value['p_stock']}}</p>
        <button type="submit" id="showEditForm-{{$value['id']}}">Edit</button>
        <button type="submit" id="showDeleteForm-{{$value['id']}}">Delete</button>
        <div id="hiddenEditForm-{{$value['id']}}" style="display: none">
            <form action="/productEdit/{{$value['id']}}" method="post">
                @csrf()
                <label>Product Name</label>
                <input type="text" name="p_name">
                <label>Product Description</label>
                <input type="text" name="p_disc">
                <label>Product Price</label>
                <input type="number" name="p_price">
                <label>Product Stock</label>
                <input type="number" name="p_stock">
                <label>Product Category</label>
                <select name="p_category" id="category" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item['id']}}">{{ $item['c_name']}}</option>
                    @endforeach
                </select>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div id="hiddenDeleteForm-{{$value['id']}}" style="display: none">
            <form action="/productDelete/{{$value['id']}}" method="post">
                @csrf()
                <p>Are you sure you want to delete this item?</p>
                <p>{{$value['p_name']}}</p>
                <button type="submit">Yes</button>
                <button type="button" onclick="showForm('hiddenDeleteForm-{{$value['id']}}')">No</button>
            </form>
        </div>

        <p><hr></p>
        @endforeach
    </div>
    <hr>
    <div>
        <p style="border: 5px solid black">Toys</p>
        @foreach($products5 as $value)
        <p>{{$value['p_name']}}</p>
        <p>{{$value['p_description']}}</p>
        <p>{{$value['p_price']}}</p>
        <p>{{$value['p_stock']}}</p>
        <button type="submit" id="showEditForm-{{$value['id']}}">Edit</button>
        <button type="submit" id="showDeleteForm-{{$value['id']}}">Delete</button>
        <div id="hiddenEditForm-{{$value['id']}}" style="display: none">
            <form action="/productEdit/{{$value['id']}}" method="post">
                @csrf()
                <label>Product Name</label>
                <input type="text" name="p_name">
                <label>Product Description</label>
                <input type="text" name="p_disc">
                <label>Product Price</label>
                <input type="number" name="p_price">
                <label>Product Stock</label>
                <input type="number" name="p_stock">
                <label>Product Category</label>
                <select name="p_category" id="category" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item['id']}}">{{ $item['c_name']}}</option>
                    @endforeach
                </select>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div id="hiddenDeleteForm-{{$value['id']}}" style="display: none">
            <form action="/productDelete/{{$value['id']}}" method="post">
                @csrf()
                <p>Are you sure you want to delete this item?</p>
                <p>{{$value['p_name']}}</p>
                <button type="submit">Yes</button>
                <button type="button" onclick="showForm('hiddenDeleteForm-{{$value['id']}}')">No</button>
            </form>
        </div>

        <p><hr></p>
        @endforeach
    </div>
    <hr>
    
    <p>{{$storeId}}</p>
    <p>{{$userId}}</p>
    <button id="showAddItemForm">Add</button>

    <div id="hiddenDiv" style="display: none">
        <form action="{{route('e_store-addProduct')}}" method="post">
            @csrf()
            <label>Product Name</label>
            <input type="text" name="p_name">
            <label>Product Description</label>
            <input type="text" name="p_disc">
            <label>Product Price</label>
            <input type="number" name="p_price">
            <label>Product Stock</label>
            <input type="number" name="p_stock">
            <label>Product Category</label>
            <select name="p_category" id="category" required>
                <option value="" disabled selected>Select a category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item['id']}}">{{ $item['c_name']}}</option>
                @endforeach
            </select>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("showAddItemForm").addEventListener("click", function() {
        //   var div = document.getElementById("hiddenDiv");
        //   div.style.display = (div.style.display === "none") ? "block" : "none"; 
            showForm("hiddenDiv");
        });
        document.querySelectorAll("[id^='showEditForm-']").forEach(function(button) {
            button.addEventListener("click", function() {
                var productId = this.id.split("-")[1]; 
                showForm("hiddenEditForm-" + productId);
            });
        });

        document.querySelectorAll("[id^='showDeleteForm-']").forEach(function(button) {
            button.addEventListener("click", function() {
                var productId = this.id.split("-")[1]; 
                showForm("hiddenDeleteForm-" + productId);
            });
        });
        function showForm(a){
          var div = document.getElementById(a);
          div.style.display = (div.style.display === "none") ? "block" : "none"; 
        }
      </script>
</body>

</html>
