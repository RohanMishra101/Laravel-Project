<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class StoreController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        $user_id = session()->get('user')->id;

        $storeUser_id = Store::where('user_id', $user_id)->first();

        $hasStore = false;
        if ($storeUser_id) {
            $hasStore = true;
        }
        return view('pages.createStore', ['categories' => $categories, 'hasStore' => $hasStore]);

    }
    public function storeCreation(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'store_name' => 'required', // Validate the filename
            'description' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
        ]);

        if ($request->hasFile('image')) {
            try {
                $image = $request->image;
                $originalExtension = $image->getClientOriginalExtension();
                $providedFilename = Str::slug($request->input('store_name'), '_');
                $newFilename = "{$providedFilename}.{$originalExtension}";

                // Use the absolute path to the public/store_image directory
                $destinationPath = public_path('store_image');

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
                $urlPath = asset('store_image/' . $finalFilename);

                $request->image=$urlPath;
            } catch (\Exception $e) {
                // Catch any errors
                Log::error($e->getMessage());
                return back()->with('error', 'An error occurred while uploading the image');
            }
        }


        // dd($c_id->id);

        $user_id = session()->get('user')->id;
        // dd("User id " . $user_id);

        $storeData = [
            'user_id' => $user_id,
            'store_name' => $request->store_name,
            'description' => $request->description,
            'img' => $request->image,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
        ];

        // dd($storeData);
        $storeUser_id = Store::where('user_id', $user_id)->first();
        if ($storeUser_id) {
            return response('The store already exists');
        } else {
            Store::create($storeData);
            return view('pages.dashboard');
        }

    }
    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
// public\store_image
