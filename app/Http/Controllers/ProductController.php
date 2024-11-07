<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return new ProductCollection($products, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product){
            return response()->json(['message' => 'Product not found'], 404);
        }

        return new ProductResource($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $userId = Auth::id();
        //validasi sudah diatur di ProductStoreRequest
        //jadi lebih rapi

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

    

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        //temukan id product
        $product = Product::find($id);
        if (!$product){
            return response()->json(['message' => 'Product not found'], 404);
        }

        //cek apakah product milik user
        if ($product->user_id !== Auth::id()){
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        //validasi sudah diatur di ProductUpdateRequest

        // Check if a new photo is being uploaded
        if ($request->hasFile('product_photo')){
            //hapus foto lama
            Storage::disk('public')->delete($product->product_photo);

            // Upload new photo
            $photoPath = $request->file('product_photo')->store('product_photos', 'public');
            $product->product_photo = $photoPath;
        }


         // Update product
         $product ->update([
            //user_id tidak perlu diupdate
            'title' => $request->title,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
            'year' => $request->year,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            // 'product_photo' gak perlu dicantumkan disini lagi
        ]);

        return response()->json(['message' => 'Product updated successfully', 'product' => $product], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //temukan id product
        $product = Product::find($id);
        if (!$product){
            return response()->json(['message' => 'Product not found'], 404);
        }

        //cek apakah product milik user
        if ($product->user_id!== Auth::id()){
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Hapus photo
        Storage::disk('public')->delete($product->product_photo);

        // Hapus product
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 204);
    
    }
}
