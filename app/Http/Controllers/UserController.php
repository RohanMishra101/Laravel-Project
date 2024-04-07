<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    public function createAccount()
    {
        return view('auth.login');
    }
    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                session()->put('user', $user);
                return redirect(route('e_store-Home'));
            } else {
                // Flash a message to the session to indicate an incorrect password
                session()->flash('error', 'The provided password is incorrect.');
                return back()->withInput($request->only('email'));
            }
        }

    }
    public function signUp(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required | email | unique:users,email',
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

            User::create($parsedData);
        }

        return view('auth.success');

    }
    public function success()
    {
        return view('auth.login');
    }
}
