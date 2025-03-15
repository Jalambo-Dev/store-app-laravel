@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Product</h2>
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <!-- Product Name -->
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter product name" required>
            </div>

            <!-- Quantity -->
            <div class="mb-3">
                <label for="productQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="productQuantity" placeholder="Enter quantity" required>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="productPrice" placeholder="Enter price"
                    required>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <select class="form-control" id="productCategory" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="home">Home</option>
                    <option value="beauty">Beauty</option>
                    <option value="sports">Sports</option>
                </select>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
