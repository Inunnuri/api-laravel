<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            'product_photo' => 'required|image|mimes:jpg,jpeg,png|max:4000',
        ]);

        if ($validator->fails()) {
            Log::error('Validation Errors: ', $validator->errors()->toArray());
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
    
    public function update(Request $request, $id)
{
    // Log the incoming request data
    Log::info('Incoming request data: ', $request->all());
    // Find the product by ID
    $product = Product::find($id);
    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Check if the authenticated user is the owner of the product
    if ($product->user_id !== Auth::id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

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
        'product_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:4000',
    ]);

    if ($validator->fails()) {
        Log::error('Validation Errors: ', $validator->errors()->toArray());
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Check if a new photo is being uploaded
    if ($request->hasFile('product_photo')) {
        // Delete the old photo
        Storage::disk('public')->delete($product->product_photo);

        // Store the new photo
        $photoPath = $request->file('product_photo')->store('product_photos', 'public');
        $product->product_photo = $photoPath;
    }

    // Update the product with new data
    $product->update([
        'title' => $request->title,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
            'year' => $request->year,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
    ]);

    return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
}
}
