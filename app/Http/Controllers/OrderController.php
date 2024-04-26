<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Models\Transaction;

class OrderController extends Controller
{

    public function addToCart($id, $storeName, Request $request)
    {

        if (session()->has('user')) {
            // dd($storeName);
            $userId = session()->get('user')->id;
            $product = Product::find($request->id);
            // dd($product);
            if ($product->p_stock < $request->NoOfOrder) {
                return redirect()->back()->with('error', 'Not enough stock');
            }
            if ($request->NoOfOrder <= 0) {
                return redirect()->back()->with('error', 'Please enter number of orders');
            }
            $orderData = [
                'product_id' => $id,
                'user_id' => $userId,
                'no_of_orders' => $request->NoOfOrder
            ];
            // dd($orderData);
            Order::create($orderData);
            if ($storeName == 'search') {
                return redirect()->back();
            } else {
                return redirect()->route('e_store-storePage', ['storeName' => $storeName]);
            }
        } else {
            return redirect(route('e_store-loginConfirm'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function inCartOrder(Request $request)
    {
        if (session()->has('user')) {
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
        } else {
            return redirect(route('e_store-loginConfirm'));
        }
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
        $transactionData = Transaction::where('user_id', session()->get('user')->id)->first();
        if ($transactionData != NULL) {
            Order::where('id', $id)->update(['order_confirm' => true]);
            return redirect()->route('e_store-inCartOrder');
        } else {
            return view('pages.transactionAdd');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function listOrder()
    {
        if (session()->has('user')) {
            $userId = session()->get('user')->id;
            $store = Store::where('user_id', $userId)->first();
            $userData = User::where('id', session()->get('user')->id)->first();
            $storeId = Store::where('user_id', $userId)->first()->id;
            $category = Category::all();
            $user = User::all();
            $products = Product::with('category')
                ->where('store_id', $storeId)->get();
            $productIds = $products->pluck('id')->toArray();
            $orders = Order::whereIn('product_id', $productIds)->where('order_confirm', true)->where('order_sent', false)->get();
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
            return view('pages.listConfirmOrders', [
                'categories' => $category,
                'products' => $orderedProducts,
                'orders' => $orders,
                'users' => $user,
                'store' => $store,
                'userData' => $userData
            ]);
        } else {
            return redirect(route('e_store-login'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function sendOrder($id, $no)
    {
        $userId = session()->get('user')->id;
        // $store = Store::where('user_id', $userId)->first();
        $order = Order::find($id);
        $order->order_sent = TRUE;
        $order->update();
        $productId = $order->product_id;
        $productStock = Product::where('id', $productId)->first();
        // return view(dd($productStock->p_stock));
        $a = intval($productStock->p_stock);
        $ans = intval($a) - $no;
        $productStock->p_stock = $ans;
        $productStock->update();
        // return view(dd($productStock));
        // return response("HI");
        return redirect()->route('e_store-listConfirmOrder');
    }

    public function listSentOrder()
    {
        $userId = session()->get('user')->id;
        $store = Store::where('user_id', $userId)->first();
        $userData = User::where('id', session()->get('user')->id)->first();
        $storeId = Store::where('user_id', $userId)->first()->id;
        $category = Category::all();
        $user = User::all();
        $products = Product::with('category')
            ->where('store_id', $storeId)->get();
        $productIds = $products->pluck('id')->toArray();
        $orders = Order::whereIn('product_id', $productIds)->where('order_confirm', true)->where('order_sent', true)->get();
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
        return view('pages.listSentOrders', [
            'categories' => $category,
            'products' => $orderedProducts,
            'orders' => $orders,
            'users' => $user,
            'store' => $store,
            'userData' => $userData,
        ]);
    }
}
