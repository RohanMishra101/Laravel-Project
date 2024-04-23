<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $store = Store::with('products')->get();

        if (session()->has('user')) {
            $userData = User::where('id', session()->get('user')->id)->first();
            return view('pages.home', [
                'categories' => $categories,
                'store' => $store,
                'userData' => $userData,
            ]);
        } else {
            return view('pages.home', [
                'categories' => $categories,
                'store' => $store,
            ]);
        }
        // $storeData = Store::all();
        // $product = Product::all();
        // dd($storeData->toArray()); 


    }
    public function createAccount()
    {
        if (session()->has('user')) {
            return redirect(route('e_store-Home'));
        } else {
            return view('auth.login');
        }
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
        } else {
            // Flash a message to the session to indicate an incorrect email
            session()->flash('error', 'The provided email is incorrect.');
            return back()->withInput($request->only('email'));
        }
    }
    public function signUp(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required | email | unique:users,email',
            'password' => 'required',
            'confirmPassword' => 'required',
        ]);

        if ($request->password == $request->confirmPassword) {

            $parsedData = [
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),

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

    public function userProfile()
    {
        $userData = session()->get('user');
        $user = User::find($userData->id);
        // dd($userData->toArray());
        if ($userData) {
            return view('pages.profile', ['userData' => $user]);
        } else {
            return redirect(route('e_store-login'));
        }
    }
    public function updateProfile($id, Request $request)
    {
        $user = User::find($id);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->address = $request->address;


        if ($request->hasFile('img')) {
            try {
                $image = $request->img;
                $originalExtension = $image->getClientOriginalExtension();
                $providedFilename = Str::slug($request->input('username'), '_');
                $newFilename = "{$providedFilename}.{$originalExtension}";

                // Use the absolute path to the public/store_image directory
                $destinationPath = public_path('user_image');

                // Ensure the directory exists
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                // Check for existing files and append a counter to the filename if needed
                $finalFilename = $newFilename;
                $counter = 1;
                while (file_exists($destinationPath . '/' . $finalFilename)) {
                    $finalFilename = "{$providedFilename}_{$counter}.{$originalExtension}";
                    $counter++;
                }

                // Move the file to the public/store_image directory
                $image->move($destinationPath, $finalFilename);

                // URL path to access the image via the web
                $urlPath = asset('user_image/' . $finalFilename);

                $request->img = $urlPath;
                $user->img = $request->img;
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return back()->with('error', 'An error occurred while uploading the image');
            }
        } else {
            if (!empty($request->img)) {
                $user->img = $request->img;
            }
        }
        // dd($user->img);
        $user->update();
        return redirect(route('e_store-userProfile'));

    }
    public function logout()
    {
        if (session()->has('user')) {
            session()->forget('user');
        }
        return redirect(route('e_store-Home'));
    }

}
