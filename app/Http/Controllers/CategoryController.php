<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\roomFeature;
use Illuminate\Http\Request;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.list', compact('categories'));
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->save();

        return back()->with('success', 'Category created successfully');
    }

    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category->title = $request->title;
        $category->save();

        return back()->with('success', 'Category updated successfully');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Category deleted successfully');
    }
    public function features()
    {
        $features = roomFeature::latest()->get();
        return view('backend.category.features', compact('features'));
    }
    public function storeFeature(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);

        $feature = new RoomFeature();
        $feature->title = $request->title;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('features', 'public');
            $feature->image = $imagePath;
        }

        $feature->save();

        return back()->with('success', 'Feature added successfully.');
    }


    public function updateFeature(Request $request, RoomFeature $feature)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);

        $feature->title = $request->title;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($feature->image && Storage::disk('public')->exists($feature->image)) {
                Storage::disk('public')->delete($feature->image);
            }

            $imagePath = $request->file('image')->store('features', 'public');
            $feature->image = $imagePath;
        }

        $feature->save();

        return back()->with('success', 'Feature updated successfully.');
    }



    public function deleteFeature(RoomFeature $feature)
    {
        if ($feature->image && Storage::disk('public')->exists($feature->image)) {
            Storage::disk('public')->delete($feature->image);
        }

        $feature->delete();

        return back()->with('success', 'Feature deleted successfully.');
    }

}
