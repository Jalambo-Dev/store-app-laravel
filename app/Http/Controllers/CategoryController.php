<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = \App\Models\Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $category = new \App\Models\Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = \App\Models\Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        \App\Models\Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}