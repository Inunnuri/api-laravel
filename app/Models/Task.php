<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
        //morphToMany memungkinkan satu kategori untuk dimiliki oleh banyak model yang berbeda dan satu model untuk memiliki banyak kategori.
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function calendar(){
        return $this->belongsTo(Calendar::class);
    }
    public function frequency(){
        return $this->belongsTo(Frequency::class);
    }
}
