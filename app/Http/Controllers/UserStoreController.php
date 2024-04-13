<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserStoreController extends Controller
{
    public function storePage($storeName)
    {
        dd($storeName);
        // return view('pages.userStore');
    }
}
