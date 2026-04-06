<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','subcategory_id','brand_id',
    'product_name',
    'image',
    'description',
    'status',
    'price',
    ];

public function brand()
{
    return $this->belongsTo(Brand::class, 'brand_id');
}

public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

public function subcategory()
{
    return $this->belongsTo(SubCategory::class, 'subcategory_id');
}
}
