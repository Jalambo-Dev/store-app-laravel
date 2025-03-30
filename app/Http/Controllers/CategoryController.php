<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // Display all categories with pagination
    public function index()
    {
        $categories = DB::table('categories')->paginate(10); // Changed from get() to paginate(10)
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    // Show the form to edit a category
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    // Update a category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->input('name'),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
