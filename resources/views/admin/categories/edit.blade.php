@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Category</h2>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <!-- Category Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection