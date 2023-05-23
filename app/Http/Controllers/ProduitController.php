<?php

namespace App\Http\Controllers;

use App\Models\CategorieModel;
use App\Models\Category;
use App\Models\Product;
use App\Models\Produit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Dompdf\Options;

class ProduitController extends Controller
{


    public function index($id)
    {
        $products = Product::where('id_category', $id)->get();
    return response()->json([
        'products' => $products,
        
    ], 200);
    }

    
}

