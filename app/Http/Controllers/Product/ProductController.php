<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        // Retrieve all products from the database
        $products = Product::all();
        return response()->json($products, 200);
    }
}