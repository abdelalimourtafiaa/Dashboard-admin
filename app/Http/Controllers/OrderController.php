<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function addOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders.*.image' => 'required',
            'orders.*.name' => 'required',
            'orders.*.prix' => 'required',
            'orders.*.name_table' => 'nullable' // Allow the name_table field to be nullable
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
    
        $orders = $request->input('orders', []);
        $nameTable = $request->input('name_table');
    
        if (empty($nameTable)) {
            return response()->json(['error' => 'Table name is required'], 422);
        }
    
        $table = Table::where('name', $nameTable)->first(); // Search for the table by its name
    
        if (!$table) {
            return response()->json(['error' => 'Table not found'], 404);
        }
    
        foreach ($orders as $orderData) {
            $order = new Order();
            $order->image = $orderData['image'];
            $order->name = $orderData['name'];
            $order->prix = $orderData['prix'];
            $order->id_table = $table->id_table;
            $order->save();
        }
    
        return response()->json([
            'message' => 'Data inserted successfully',
            'orders' => $orders,
        ], 200);
    }
    

}
