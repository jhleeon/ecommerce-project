<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'product_code',
        'product_name',
        'product_slug',
        'price',
        'short_description',
        'long_description',
        'quantity',
        'status',
        'image-one',
        'image-two',
        'image-three',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
