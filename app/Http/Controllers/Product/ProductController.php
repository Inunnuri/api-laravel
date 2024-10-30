<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        // Retrieve all products from the database
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function store(Request $request){
        $userId = Auth::id();
         // Validate the request data
         $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'type_id' => 'nullable|exists:types,id',
            'status_id' => 'nullable|exists:statuses,id',
            'year' => 'required|string|max:4',
            'description' => 'required|string',
            'price' => 'required|string',
            'location' => 'required|string',
            'product_photo' => 'required|image|mimes:jpg, jpeg, png |max:4000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $photoPath = $request->file('product_photo')->store('product_photos', 'public');


         // Create a new product
         $product = Product::create([
            'user_id' => $userId,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
            'year' => $request->year,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'product_photo' => $photoPath,
        ]);

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }
}
