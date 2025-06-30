<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
}
