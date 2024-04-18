<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class UserStoreController extends Controller
{
    public function storePage($storeName)
    {
        $storeData = Store::where('store_name', $storeName)->get();
        // dd($storeData->toArray());
        if ($storeData) {
            $userId = $storeData->toArray()[0]['user_id'];
            // Retrieve user data based on user_id
            $user = User::find($userId);

            // If user exists, you can access the user's email directly
            if ($user) {
                $userEmail = $user->email;
                // dd($userEmail);
            } else {
                dd('User not found');
            }
        } else {
            dd('Store not found');
        }
        $storeId = $storeData->toArray()[0]['id'];
        $category = Category::all();
        $products = Product::with('category')->where('store_id', $storeId)->get();
        // dd($products->toArray());


        return view('store.userStore', [
            'storeData' => $storeData,
            'userEmail' => $userEmail,
            'categories' => $category,
            'productData' => $products
        ]);

    }
}
