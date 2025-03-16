@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Product</h2>
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name"
                    required>
            </div>

            <!-- Product Image -->
            <div class="mb-3">
                <label for="image_url" class="form-label">Product Image URL</label>
                <input type="url" class="form-control" id="image_url" name="image_url" placeholder="Enter image URL">
            </div>

            <!-- Quantity -->
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity"
                    required>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price"
                    placeholder="Enter price" required>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    placeholder="Enter product description"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
