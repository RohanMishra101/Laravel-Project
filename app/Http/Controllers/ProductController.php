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
        return view('pages.dashboard',['storeId' => $storeId,'userId'=>$userId,'categories'=>$category,'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addProduct(Request $request)
    {
        $category= Category::all();
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id',$userId)->first()->id;
        $products=Product::where('store_id',$storeId)->get();

        $productData=[
            'store_id'=>$storeId,
            'c_id'=>$request->p_category,
            'p_name'=>$request->p_name,
            'p_description'=>$request->p_disc,
            'p_price'=>$request->p_price,
            'p_stock'=>$request->p_stock
        ];
        // $p_name=$request->p_name;   
        // $p_disc=$request->p_disc;
        // $p_price=$request->p_price;
        // $p_stock=$request->p_stock;
        // $p_category=$request->p_category;

        // $add=new Product();
        // $add->store_id=$storeId;
        // $add->c_id=$p_category;
        // $add->p_name=$p_name;
        // $add->p_description=$p_disc;
        // $add->p_price=$p_price;
        // $add->p_stock=$p_stock;

        // $add->save();
        Store::create($productData);
        return view('pages.dashboard',['storeId' => $storeId,'userId'=>$userId,'categories'=>$category,'products'=>$products]);
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
        $products=Product::where('store_id',$storeId)->get();
        return view('pages.dashboard',['storeId' => $storeId,'userId'=>$userId,'categories'=>$category,'products'=>$products]);
    }

    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        $category= Category::all();
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id',$userId)->first()->id;
        $products=Product::where('store_id',$storeId)->get();
        return view('pages.dashboard',['storeId' => $storeId,'userId'=>$userId,'categories'=>$category,'products'=>$products]);
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
