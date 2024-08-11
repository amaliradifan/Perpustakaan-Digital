<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'title' => 'Category | Perpustakaan Digital',
            'active' => 'categories',
            'categories' => Category::all(),
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create($validatedData);

        // Redirect atau tampilkan pesan sukses
        return redirect('/categories')->with('success', 'Category created successfully.');
    }

    public function destroy($id)
{
    $category = Category::findOrFail($id);

    if ($category->books()->count() > 0) {
        return redirect('/categories')->with('errorDelete', 'Cannot delete category because it still has associated books.');
    }

    $category->delete();

    return redirect('/categories')->with('success', 'Category deleted successfully.');
}


    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return redirect('/categories')->with('success', 'Category updated successfully.');
    }
}
