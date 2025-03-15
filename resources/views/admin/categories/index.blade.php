@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Category List</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Category Row -->
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('admin.categories.delete', parameters: $category->id) }}"
                                class="btn btn-sm btn-danger">
                                Delete
                            </a>
                            {{-- <button class="btn btn-sm btn-danger">Delete</button> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
