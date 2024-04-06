<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function home()
    {
        return view('home.main');
    }
    public function signUp(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required',
            'isMerchant' => 'required'
        ]);

        if ($request->password == $request->confirmPassword) {

            $parsedData = [
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'isMerchant' => $request->isMerchant === 'true' ? true : false,
            ];
            // dd($parsedData);

            // User::create($parsedData);
        }

        return view('auth.success');

    }
    public function success()
    {
        return view('auth.login');
    }
}
