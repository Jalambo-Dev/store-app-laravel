@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Category</h2>
        <form action="{{ route('admin.categorys.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <!-- Category Name -->
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="categoryName" required value="{{ $category->name }}">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
