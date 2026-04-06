<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;


class ShowsubcategoryproductController extends Controller
{

      public function index($subCategoryId)
    {
        // Find the subcategory
        $subCategory = SubCategory::findOrFail($subCategoryId);

        // Get products related to this subcategory (assuming relation exists)
        $products = $subCategory->products()->get();

        return view('user.showsubcategoryproduct', compact('subCategory', 'products'));
    }

}
