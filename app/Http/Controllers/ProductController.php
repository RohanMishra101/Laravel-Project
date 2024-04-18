<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id', $userId)->first()->id;
        $category = Category::all();
        $products = Product::with('category')->where('store_id', $storeId)->get();

        return view('pages.dashboard', [
            'categories' => $category,
            'productData' => $products,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function addProduct(Request $request)
    {
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id', $userId)->first()->id;


        if ($request->hasFile('p_img')) {
            try {
                $image = $request->p_img;
                $originalExtension = $image->getClientOriginalExtension();
                $providedFilename = Str::slug($request->input('p_name'), '_');
                $newFilename = "{$providedFilename}.{$originalExtension}";

                // Use the absolute path to the public/store_image directory
                $destinationPath = public_path('product_image');

                // Ensure the directory exists
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                // Check for existing files and append a counter to the filename if needed
                $finalFilename = $newFilename;
                $counter = 1;
                while (file_exists($destinationPath . '/' . $finalFilename)) {
                    $finalFilename = "{$providedFilename}_{$counter}.{$originalExtension}";
                    $counter++;
                }

                // Move the file to the public/store_image directory
                $image->move($destinationPath, $finalFilename);

                // URL path to access the image via the web
                $urlPath = asset('product_image/' . $finalFilename);

                $request->p_img = $urlPath;
                // dd($request->p_img);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return back()->with('error', 'An error occurred while uploading the image');
            }
        }
        $productData = [
            'store_id' => $storeId,
            'c_id' => $request->p_category,
            'p_name' => $request->p_name,
            'p_img' => $request->p_img,
            'p_description' => $request->p_disc,
            'p_price' => $request->p_price,
            'p_stock' => $request->p_stock
        ];
        Product::create($productData);
        // $userId = session()->get('user')->id;
        // $storeId = Store::where('user_id', $userId)->first()->id;
        // $products1 = Product::where('store_id', $storeId)->where('c_id', 1)->get();
        // $products2 = Product::where('store_id', $storeId)->where('c_id', 2)->get();
        // $products3 = Product::where('store_id', $storeId)->where('c_id', 3)->get();
        // $products4 = Product::where('store_id', $storeId)->where('c_id', 4)->get();
        // $products5 = Product::where('store_id', $storeId)->where('c_id', 5)->get();
        // return view('pages.dashboard', ['storeId' => $storeId, 'userId' => $userId, 'categories' => $category, 'products1' => $products1, 'products2' => $products2, 'products3' => $products3, 'products4' => $products4, 'products5' => $products5]);
        return redirect(route('e_store-dashboard'));
    }


    public function editProduct($id, Request $request)
    {
        // dd($id);
        $product = Product::find($id);
        dd($product->toArray());
        $product->p_img = $request->p_img;
        $product->c_id = $request->p_category;
        $product->p_name = $request->p_name;
        $product->p_description = $request->p_disc;
        $product->p_price = $request->p_price;
        $product->p_stock = $request->p_stock;

        $product->update();
        // $category = Category::all();
        // $userId = session()->get('user')->id;
        // $storeId = Store::where('user_id', $userId)->first()->id;
        // $products1 = Product::where('store_id', $storeId)->where('c_id', 1)->get();
        // $products2 = Product::where('store_id', $storeId)->where('c_id', 2)->get();
        // $products3 = Product::where('store_id', $storeId)->where('c_id', 3)->get();
        // $products4 = Product::where('store_id', $storeId)->where('c_id', 4)->get();
        // $products5 = Product::where('store_id', $storeId)->where('c_id', 5)->get();
        // return view('pages.dashboard', ['storeId' => $storeId, 'userId' => $userId, 'categories' => $category, 'products1' => $products1, 'products2' => $products2, 'products3' => $products3, 'products4' => $products4, 'products5' => $products5]);

        // return redirect(route('pro'));
        return redirect(route('e_store-dashboard'));

    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        $category = Category::all();
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id', $userId)->first()->id;
        $products1 = Product::where('store_id', $storeId)->where('c_id', 1)->get();
        $products2 = Product::where('store_id', $storeId)->where('c_id', 2)->get();
        $products3 = Product::where('store_id', $storeId)->where('c_id', 3)->get();
        $products4 = Product::where('store_id', $storeId)->where('c_id', 4)->get();
        $products5 = Product::where('store_id', $storeId)->where('c_id', 5)->get();
        return view('pages.dashboard', ['storeId' => $storeId, 'userId' => $userId, 'categories' => $category, 'products1' => $products1, 'products2' => $products2, 'products3' => $products3, 'products4' => $products4, 'products5' => $products5]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
