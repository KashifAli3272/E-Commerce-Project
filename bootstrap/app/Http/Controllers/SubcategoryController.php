<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function create()
{
    $categories = Category::all();// only active categories
    return view('Add_sub_category', compact('categories'));
}
public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'subcategory_name' => 'required',
        'image' => 'required|image',
    ]);

    $imagePath = $request->file('image')->store('subcategories', 'public');
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->image = $imagePath;
        $subcategory->description = $request->description;
        $subcategory->status = $request->status;
        $subcategory->save();


    return redirect()->route('subcategory.index')
    ->with('success', 'Sub Category Added Successfully!');
}
public function index(Request $request)
{
   $categories = SubCategory::query()
    ->when($request->filled('status'), function ($q) use ($request) {
        $q->where('status', $request->status);
    })
    ->latest()
    ->paginate(10); // must use paginate, not get() or all()

    return view('Manage_Subcategory', compact('categories'));
}
public function edit(SubCategory $subcategory)
{
    //
    return view('editsub_category', compact('subcategory'));
}
public function update(Request $request, SubCategory $subcategory)
{
    $request->validate([
        'subcategory_name' => 'required',
        'description' => 'required',
        'category_id' => 'nullable',
        'status' => 'required|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
    ]);

    if ($request->hasFile('image')) {
        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }
        $subcategory->image = $request->file('image')->store('subcategories', 'public');
    }

    $subcategory->subcategory_name = $request->subcategory_name;
    $subcategory->description = $request->description;
    $subcategory->status = $request->status;
    $subcategory->save();

    return redirect()->route('subcategory.index')->with('success', 'Category updated successfully!');
}

public function destroy(SubCategory $subcategory)
{
    if ($subcategory->image) {
        Storage::disk('public')->delete($subcategory->image);
    }
    $subcategory->delete();
    return back()->with('success', 'Sub Category deleted successfully!');
}

}


