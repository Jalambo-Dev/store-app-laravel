@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Product List</h2>

        <!-- Add New Product Button -->
        <div class="mb-3">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Product
            </a>
        </div>

        <!-- Products Table -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST"
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
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
