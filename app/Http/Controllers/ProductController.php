<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // Import the Category model

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        // Fetch all categories from the database
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url', // Validate that the input is a valid URL
        ]);

        // Create the product
        Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url, // Store the image URL
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        // Fetch all categories from the database
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url', // Validate that the input is a valid URL
        ]);

        $product = Product::findOrFail($id);

        // Update the product
        $product->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url, // Update the image URL
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }


    public function frontPage()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the products to the front page view
        return view('front.index', compact('products'));
    }
}
