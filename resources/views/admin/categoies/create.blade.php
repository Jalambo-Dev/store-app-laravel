@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Category</h2>
        <form action="{{ route('admin.categorys.store') }}" method="POST">
            @csrf
            <!-- Category Name -->
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="categoryName" placeholder="Enter category name" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
@endsection
