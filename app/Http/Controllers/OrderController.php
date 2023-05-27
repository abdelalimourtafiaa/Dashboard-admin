<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function addOrder(Request $request)
{
    $validator = Validator::make($request->all(), [
        '*.image' => 'required',
        '*.name' => 'required',
        '*.prix' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    foreach ($request->all() as $orderData) {
        $order = new Order();
        $order->image = $orderData['image'];
        $order->name = $orderData['name'];
        $order->prix = $orderData['prix'];
        $order->save();
    }

    return response()->json([
        'message' => 'Data inserted successfully',
        'orders' => Order::all(), // Retrieve all orders from the database
    ], 200);
}


}
