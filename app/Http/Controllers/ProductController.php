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
        $category = Category::all();
        if (session()->has('user')) {
            $userId = session()->get('user')->id;
            // $user_id = session()->get('user')->id;
            $store = Store::where('user_id', $userId)->first();
            // dd($store->toArray());
            if (!$store) {
                return redirect(route('e_store-storeConfirm'));
            } else {
                $storeId = Store::where('user_id', $userId)->first()->id;
                $products = Product::with('category')
                    ->where('store_id', $storeId)
                    ->get();
                // $products = Product::with('product')->get();
                // dd($products->toArray());
                $productsByCategory = $products->groupBy('c_id');
                // dd($productsByCategory->toArray());
                return view('pages.dashboard', [
                    'categories' => $category,
                    'productsByCategory' => $productsByCategory,
                ]);
            }
        } else {
            return redirect(route('e_store-login'));
        }

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
        return redirect(route('e_store-dashboard'));
    }



    public function editStore($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('store.edit', ['categories' => $categories, 'product' => $product]);
    }
    public function editProduct($id, Request $request)
    {
        // dd($id);
        $product = Product::find($id);
        // dd($product->toArray());
        // $product->p_img = $request->p_img;
        $product->c_id = $request->c_id;
        $product->p_name = $request->p_name;
        $product->p_description = $request->p_disc;
        $product->p_price = $request->p_price;
        $product->p_stock = $request->p_stock;

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
                $product->p_img = $request->p_img;
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return back()->with('error', 'An error occurred while uploading the image');
            }
        } else {
            $request->p_img = $product->p_img;
            // dd($request->p_img);
        }

        $product->update();
        return redirect(route('e_store-dashboard'));

    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        // dd($product->toArray());
        $product->delete();

        return redirect(route('e_store-dashboard'));
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
