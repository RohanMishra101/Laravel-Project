<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class UserStoreController extends Controller
{
    public function storePage($storeName)
    {
        $storeData = Store::where('store_name', $storeName)->get();
        // dd($storeData->toArray());

        // dd($storeData->toArray());
        return view('store.userStore', ['storeData' => $storeData]);
        // dd($storeName);
        // return view('pages.userStore');

    }
}
