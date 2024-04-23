<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;

class OrderController extends Controller
{

    public function addToCart($id, $storeName, Request $request)
    {
        $userId = session()->get('user')->id;
        // $storeName = Store::where('id', $userId)->first()->store_name;

        $request->validate([
            'NoOfOrder' => 'required',
        ]);

        $orderData = [
            'product_id' => $id,
            'user_id' => $userId,
            'no_of_orders' => $request->NoOfOrder
        ];
        // dd($orderData);

        Order::create($orderData);
        return redirect()->route('e_store-storePage', ['storeName' => $storeName]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function inCartOrder(Request $request)
    {
        $userId = session()->get('user')->id;
        $category = Category::all();
        $productId = Order::where('user_id', $userId)->pluck('product_id');
        $cartDetails = Order::where('user_id', $userId)->get();
        $cartItems = Product::whereIn('id', $productId)->get();
        return view('cart.cart', [
            'categories' => $category,
            // 'cartItems'=>  $productId,
            'cartItems' => $cartItems,
            'cartDetails' => $cartDetails
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function deleteCartOrder($id)
    {
        $product = Order::find($id);
        $product->delete();
        return redirect()->route('e_store-inCartOrder');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function confirmCartOrder($id)
    {
        $cartDetails = Order::where('id', $id)->update(['order_confirm' => true]);
        ;
        return redirect()->route('e_store-inCartOrder');
    }

    /**
     * Update the specified resource in storage.
     */
    public function listOrder()
    {
        $userId = session()->get('user')->id;
        $storeId = Store::where('user_id', $userId)->first()->id;
        $category = Category::all();
        $products = Product::with('category')
            ->where('store_id', $storeId)->get();
        $productIds = $products->pluck('id')->toArray();
        $orders = Order::whereIn('product_id', $productIds)->where('order_confirm', true)->get();
        // Create an empty array to store product details
        $orderedProducts = [];

        // Loop through each order and retrieve the product details
        foreach ($orders as $order) {
            $productId = $order->product_id;
            $product = Product::find($productId);
            if ($product) {
                $orderedProducts[] = $product;
            }
        }

        //dd($orderedProducts);
        // dd($orders);
        // $orderedProducts=Product::whereIn('id',$orders->product_id)->get();
        return view('pages.testOrders', [
            'categories' => $category,
            'products' => $orderedProducts,
            'orders' => $orders
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
