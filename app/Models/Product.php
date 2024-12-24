<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'isVeg',
        'price',
        'discount_price',
        'category_id', 
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
