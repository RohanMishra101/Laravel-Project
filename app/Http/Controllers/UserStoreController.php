<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class UserStoreController extends Controller
{
    public function storePage($storeName)
    {
        $storeData = Store::where('store_name', $storeName)->get();

        if ($storeData) {
            $userId = $storeData->toArray()[0]['user_id'];
            // dd($userId);
            // Retrieve user data based on user_id
            $user = User::find($userId); // Using find() is more appropriate for primary key searches

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

        // dd($storeData->toArray());
        return view('store.userStore', [
            'storeData' => $storeData,
            'userEmail' => $userEmail
        ]);
        // dd($storeName);
        // return view('pages.userStore');

    }
}
