<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
     public function create()
{

    $categories = Brand::all();// only active categories
    return view('Add_Brand', compact('categories'));
}
public function store(Request $request)
{
    $request->validate([
        'brand_name' => 'required',
        'image' => 'required|image',
    ]);

    $imagePath = $request->file('image')->store('brands', 'public');

    $brand = new Brand();
    $brand->brand_name = $request->brand_name;
    $brand->image = $imagePath;
    $brand->description = $request->description;
    $brand->status = $request->status ?? 1;
    $brand->save();

    return redirect()->route('brand.index')
   ->with('success', 'Brand Added Successfully!');
}public function index(Request $request)
{
   $categories = Brand::query()
    ->when($request->filled('status'), function ($q) use ($request) {
        $q->where('status', $request->status);
    })
    ->latest()
    ->paginate(10); // must use paginate, not get() or all()

    return view('Manage_Brand', compact('categories'));
}
public function edit(Brand $brand)
{
    //
    return view('editbrand', compact('brand'));
}
public function update(Request $request, Brand $brand)
{
    $request->validate([
        'subcategory_name' => 'required',
        'description' => 'required',
        'category_id' => 'nullable',
        'status' => 'required|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
    ]);

    if ($request->hasFile('image')) {
        if ($brand->image) {
            Storage::disk('public')->delete($brand->image);
        }
        $brand->image = $request->file('image')->store('brands', 'public');
    }

    $brand->brand_name = $request->brand_name;
    $brand->description = $request->description;
    $brand->status = $request->status;
    $brand->save();

    return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');
}

public function destroy(Brand $brand)
{
    if ($brand->image) {
        Storage::disk('public')->delete($brand->image);
    }
    $brand->delete();
    return back()->with('success', 'Brand deleted successfully!');
}
}
