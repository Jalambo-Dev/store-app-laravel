@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Product</h2>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ $product->name }}">
            </div>

            <!-- Product Image -->
            <div class="mb-3">
                <label for="image_url" class="form-label">Product Image URL</label>
                <input type="url" class="form-control" id="image_url" name="image_url" placeholder="Enter image URL"
                    value="{{ $product->image_url }}">
                @if ($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-thumbnail mt-2"
                        width="100">
                @endif
            </div>

            <!-- Quantity -->
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required
                    value="{{ $product->quantity }}">
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required
                    value="{{ $product->price }}">
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
