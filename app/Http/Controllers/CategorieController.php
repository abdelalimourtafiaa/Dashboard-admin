<?php

namespace App\Http\Controllers;

use App\Models\CategorieModel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Options;

class CategorieController extends Controller
{
    public function getCategories()
    {
        $categorie=Category::all();
        return response()->json([
            'categorie' => $categorie,
            
        ], 200);
    }

    public function getProducts()
    {
        $products=Product::all();
        return response()->json([
            'products' => $products,
            
        ], 200);
        }
}

