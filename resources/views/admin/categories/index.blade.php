@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Category List</h2>
        <!-- Add New Category Button -->
        <div class="mb-3">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Category
            </a>
        </div>

        <!-- Categories Table -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="d-flex justify-content-start mt-4">
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
