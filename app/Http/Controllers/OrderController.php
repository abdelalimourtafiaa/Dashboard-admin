<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        return response()->json([
            'errors' => $validator->errors(),
        ], 400);
    }

    $names = [];
    $totalPrice = 0;

    foreach ($request->all() as $orderData) {
        $names[] = $orderData['name'];
        $totalPrice += $orderData['prix'];
    }

    $order = new Order();
    $order->image = $request->input('0.image');
    $order->name = implode(', ', $names);
    $order->prix = $totalPrice;
    $order->save();

    return response()->json([
        'message' => 'Data inserted successfully',
        'order' => $order,
    ], 200);
}

}
