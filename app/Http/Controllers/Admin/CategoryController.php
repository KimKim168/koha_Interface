<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPage; // Import the CategoryPage model
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'name_kh' => 'required|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'name_kh' => $request->name_kh,
        ]);

        return redirect('admin/categories');
    }

    /**
     * Display all pages for a specific category.
     */
    public function getCategoryPages($categoryId)
    {
        $category = Category::with('pages')->find($categoryId);

        if (!$category) {
            return redirect('admin/categories')->with('error', 'Category not found');
        }

        return view('admin.categories.pages', [
            'category' => $category,
            'pages' => $category->pages,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'name_kh' => 'required|max:255',
        ]);

        $category = Category::find($id);

        if (!$category) {
            return redirect('admin/categories')->with('error', 'Category not found');
        }

        $category->update([
            'name' => $request->name,
            'name_kh' => $request->name_kh,
        ]);

        return redirect('admin/categories')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->back()->with('status', 'Delete Successful');
    }
}
