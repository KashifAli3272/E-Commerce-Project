<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function show(){
        return view("AddCategoryForm");
    }
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'category_id' => 'nullable',
        'status' => 'required|boolean',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
    ]);

    if (Category::where('name', $request->name)->exists()) {
        return back()->with('error', 'Category already exists!');
    }

    $imagePath = $request->file('image')->store('categories', 'public');

    $category = new Category();
    $category->name = $request->name;
    $category->description = $request->description;
    $category->image = $imagePath;
    $category->status = $request->status;
    $category->save();

    return redirect()->route('category.index')->with('success', 'Category added successfully!');
}

public function index(Request $request)
{
   $categories = Category::query()
    ->when($request->filled('status'), function ($q) use ($request) {
        $q->where('status', $request->status);
    })
    ->latest()
    ->paginate(10); // must use paginate, only paginate can use with query builder upto 10;

    return view('ManageCategory', compact('categories'));
}
public function edit(Category $category)
{

    return view('editcategory', compact('category'));
}
public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'category_id' => 'nullable',
        'status' => 'required|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
    ]);

    if ($request->hasFile('image')) {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->image = $request->file('image')->store('categories', 'public');
    }

    $category->name = $request->name;
    $category->description = $request->description;
    $category->status = $request->status;
    $category->save();

    return redirect()->route('category.index')->with('success', 'Category updated successfully!');
}

public function destroy(Category $category)
{
    if ($category->image) {
        Storage::disk('public')->delete($category->image);
    }
    $category->delete();
    return back()->with('success', 'Category deleted successfully!');
}

}

