<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{


     public function create()
{
    $categories = Category::all();// only active categories
    $subcategories = SubCategory::all();// only active subcategories
    $brands = Brand::all();
    return view('Add_product', compact('categories', 'subcategories', 'brands'));
}
public function store(Request $request)
{
    $request->validate([
        'product_name' => 'required',
        'image' => 'required|image',

    ]);

    $imagePath = $request->file('image')->store('products', 'public');

    $product = new Product();
    $product->category_id = $request->category_id;
    $product->subcategory_id = $request->subcategory_id;
    $product->brand_id = $request->brand_id;
    $product->product_name = $request->product_name;
    $product->image = $imagePath;
    $product->description = $request->description;
    $product->status = $request->status ?? 1;
    $product->price = $request->price;
    $product->save();

    return redirect()->route('product.index')
   ->with('success', 'Product Added successfully!');
}public function index(Request $request)
{
    $query = Product::query();

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('q')) {
        $query->where('product_name', 'like', "%{$request->q}%")
        ->orWhere("price", "like","%{$request->q}%");

    }

    $categories = $query->with(['brand', 'category'])->paginate(12)->withQueryString();

    return view('Manageproduct', compact('categories'));
}

public function edit(Product $product)
{
    $product = Product::findOrFail($product->id);

    $categories = Category::all();
    $subcategories = SubCategory::all();
    $brands = Brand::all();

    return view('Editproduct', compact(
        'product',
        'categories',
        'subcategories',
        'brands'
    ));
}
public function update(Request $request, Product $product)
{
    $request->validate([
        'product_name' => 'required',
        'description' => 'required',
        'category_id' => 'nullable',
        'subcategory_id' => 'nullable',
        'brand_id' => 'required|exists:brands,id',
        'status' => 'required|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
        'price' => 'required|numeric|min:0',



    ]);

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->image = $request->file('image')->store('products', 'public');
    }

    $product->product_name = $request->product_name;
    $product->description = $request->description;
    $product->status = $request->status;
    $product->brand_id = $request->brand_id;
    $product->subcategory_id = $request->subcategory_id;
    $product->category_id = $request->category_id;
    $product->price = $request->price;
    $product->save();

    return redirect()->route('product.index')->with('success', 'Product updated successfully!');
}

public function destroy(Product $product)
{
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }
    $product->delete();
    return back()->with('success', 'Product deleted successfully!');
}
}


