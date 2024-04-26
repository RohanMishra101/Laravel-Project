<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function index(Request $request)
    {

        if ($request->search) {
            $products = Product::where('p_name', 'like', '%' . $request->search . '%')->get();
        }


        if (session()->has('user')) {
            // dd($request->search);

            $userId = session()->get('user')->id;
            $userData = User::where('id', session()->get('user')->id)->first();
            // $storeName = Store::where('id', $userId)->first()->store_name;
            // dd($storeName);

            return view('pages.searchProduct', [
                'userData' => $userData,
                'searchedProduct' => $products,
            ]);
        } else {
            return view('pages.searchProduct', [
                'searchedProduct' => $products,
            ]);
        }


    }
}
