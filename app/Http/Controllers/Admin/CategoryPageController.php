<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPage;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{


    /**
     * Display a listing of category pages.
     */
    public function index(Request $request)
    {
        $categoryPages = CategoryPage::with('category')->get();
        return view('admin.categories_pages.index', [
            'categoryPages' => $categoryPages,
        ]);
    }

    /**
     * Show the form for creating a new category page.
     */
    public function create()
    {
        // Fetch all categories for the select dropdown
        $categories = Category::all();
        return view('admin.categories_pages.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created category page in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'title_kh' => 'required|max:255',
            'description' => 'required',
            'description_kh' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        CategoryPage::create([
            'title' => $request->title,
            'title_kh' => $request->title_kh,
            'description' => $request->description,
            'description_kh' => $request->description_kh,
            'category_id' => $request->category_id,
        ]);

        return redirect('admin/categories_pages')->with('success', 'Category page created successfully');
    }

    /**
     * Display the specified category page.
     */
    public function show($id)
    {
        $categoryPage = CategoryPage::with('category')->find($id);

        if (!$categoryPage) {
            return redirect('admin/categories_pages')->with('error', 'Category page not found');
        }

        return view('admin.categories_pages.show', [
            'categoryPage' => $categoryPage,
        ]);
    }




    /**
     * Show the form for editing the specified category page.
     */

    public function edit($id)
    {
        $categoryPage = CategoryPage::find($id);
        $categories = Category::all();

        if (!$categoryPage) {
            return redirect('admin/categories_pages')->with('error', 'Category page not found');
        }

        return view('admin.categories_pages.edit', [
            'categoryPage' => $categoryPage,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified category page in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'title_kh' => 'required|max:255',
            'description' => 'required',
            'description_kh' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $categoryPage = CategoryPage::find($id);

        if (!$categoryPage) {
            return redirect('admin/categories_pages')->with('error', 'Category page not found');
        }

        $categoryPage->update([
            'title' => $request->title,
            'title_kh' => $request->title_kh,
            'description' => $request->description,
            'description_kh' => $request->description_kh,
            'category_id' => $request->category_id,
        ]);

        return redirect('admin/categories_pages')->with('success', 'Category page updated successfully');
    }

    /**
     * Remove the specified category page from storage.
     */
    public function destroy($id)
    {
        $categoryPage = CategoryPage::find($id);

        if (!$categoryPage) {
            return redirect()->back()->with('error', 'Category page not found');
        }

        $categoryPage->delete();
        return redirect()->back()->with('status', 'Category page deleted successfully');
    }
}