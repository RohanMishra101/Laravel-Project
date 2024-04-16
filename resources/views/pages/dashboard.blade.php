<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-store</title>
</head>

<body>
    <p>Hi</p>
    @foreach($products as $value)
    <p>{{$value['p_name']}}</p>
    <p>{{$value['p_description']}}</p>
    <p>{{$value['p_price']}}</p>
    <p>{{$value['p_stock']}}</p>
    <p><hr></p>
    @endforeach
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
          var div = document.getElementById("hiddenDiv");
          div.style.display = (div.style.display === "none") ? "block" : "none"; 
        });
      </script>
</body>

</html>
