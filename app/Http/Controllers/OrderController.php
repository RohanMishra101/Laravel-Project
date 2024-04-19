<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function addOrder($id, Request $request)
    {
        $userId = session()->get('user')->id;
        $userName = User::where('user_id', $userId)->first()->username;
        $orderData = [
            'product_id'=>$id,
            'user_id'=>$userId,
            'no_of_orders'=>$request->NoOfOrder
        ];
        // dd($orderData);
        Order::create($orderData);
        return redirect()->route('e_store-storePage', ['storeName' => $userName]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
