<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $table = 'products';


    protected $fillable = ['user_id', 'title', 'category_id', 'brand_id', 'type_id', 'status_id', 'year', 'description', 'price', 'location', 'product_photo'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relasi/ hubungkan tabel category
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //relasi/hubungkan tabel brand
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    //relasi/hubungkan tabel type
    public function type(){
        return $this->belongsTo(Type::class);
    }
    //relasi/hubungkan tabel status
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
