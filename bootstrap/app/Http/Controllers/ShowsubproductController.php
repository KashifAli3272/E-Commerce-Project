<?php

namespace App\Http\Controllers;


use App\Models\SubCategory;

class ShowsubproductController extends Controller
{
public function index($id)
{
    $subcategory = SubCategory::findOrFail($id);
    $products = $subcategory->products;

    return view('user.showsubcategoryproduct', compact('products'));
}

}
