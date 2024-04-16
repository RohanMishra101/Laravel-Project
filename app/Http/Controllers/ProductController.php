<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id',$userId)->first()->id;
        $category= Category::all();
        $products=Product::where('store_id',$storeId)->get();
        $products1=Product::where('store_id',$storeId)->where('c_id',1)->get();
        $products2=Product::where('store_id',$storeId)->where('c_id',2)->get();
        $products3=Product::where('store_id',$storeId)->where('c_id',3)->get();
        $products4=Product::where('store_id',$storeId)->where('c_id',4)->get();
        $products5=Product::where('store_id',$storeId)->where('c_id',5)->get();
        return view('pages.dashboard',['storeId' => $storeId,'userId'=>$userId,'categories'=>$category,'products1'=>$products1,'products2'=>$products2,'products3'=>$products3,'products4'=>$products4,'products5'=>$products5]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addProduct(Request $request)
    {
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id',$userId)->first()->id;

        $productData=[
            'store_id'=>$storeId,
            'c_id'=>$request->p_category,
            'p_name'=>$request->p_name,
            'p_description'=>$request->p_disc,
            'p_price'=>$request->p_price,
            'p_stock'=>$request->p_stock
        ];
        Store::create($productData);
        $category= Category::all();
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id',$userId)->first()->id;
        $products1=Product::where('store_id',$storeId)->where('c_id',1)->get();
        $products2=Product::where('store_id',$storeId)->where('c_id',2)->get();
        $products3=Product::where('store_id',$storeId)->where('c_id',3)->get();
        $products4=Product::where('store_id',$storeId)->where('c_id',4)->get();
        $products5=Product::where('store_id',$storeId)->where('c_id',5)->get();
        return view('pages.dashboard',['storeId' => $storeId,'userId'=>$userId,'categories'=>$category,'products1'=>$products1,'products2'=>$products2,'products3'=>$products3,'products4'=>$products4,'products5'=>$products5]);
    }

    
    public function editProduct($id,Request $request)
    {

        $product=Product::find($id);
        $product->c_id = $request->p_category;
        $product->p_name = $request->p_name;
        $product->p_description = $request->p_disc;
        $product->p_price = $request->p_price;
        $product->p_stock = $request->p_stock;
        
        $product->update();
        $category= Category::all();
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id',$userId)->first()->id;
        $products1=Product::where('store_id',$storeId)->where('c_id',1)->get();
        $products2=Product::where('store_id',$storeId)->where('c_id',2)->get();
        $products3=Product::where('store_id',$storeId)->where('c_id',3)->get();
        $products4=Product::where('store_id',$storeId)->where('c_id',4)->get();
        $products5=Product::where('store_id',$storeId)->where('c_id',5)->get();
        return view('pages.dashboard',['storeId' => $storeId,'userId'=>$userId,'categories'=>$category,'products1'=>$products1,'products2'=>$products2,'products3'=>$products3,'products4'=>$products4,'products5'=>$products5]);
    }

    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        $category= Category::all();
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id',$userId)->first()->id;
        $products1=Product::where('store_id',$storeId)->where('c_id',1)->get();
        $products2=Product::where('store_id',$storeId)->where('c_id',2)->get();
        $products3=Product::where('store_id',$storeId)->where('c_id',3)->get();
        $products4=Product::where('store_id',$storeId)->where('c_id',4)->get();
        $products5=Product::where('store_id',$storeId)->where('c_id',5)->get();
        return view('pages.dashboard',['storeId' => $storeId,'userId'=>$userId,'categories'=>$category,'products1'=>$products1,'products2'=>$products2,'products3'=>$products3,'products4'=>$products4,'products5'=>$products5]);
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
