<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'category_id', 'brand_id', 'type_id', 'status_id', 'year', 'description', 'price', 'location', 'product_photo'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
