<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TableController extends Controller
{
    public function addNumber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        foreach ($request->all() as $tableData) {
            $table = new Table();
            $table->id = $tableData['id'];
            $table->prix = $tableData['name'];
            $table->save();
        }

        return response()->json([
            'message' => 'Data inserted successfully',
            'tables' => Table::all(),
        ], 200);
    }
}
