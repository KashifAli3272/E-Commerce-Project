<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name","description","category_id",
    "image","created_at","updated_at","status","categories"];


public function subcategory()
{
    return $this->hasMany(SubCategory::class, 'category_id');

}
public function subcategories()
{
    return $this->hasMany(SubCategory::class);
}
}
