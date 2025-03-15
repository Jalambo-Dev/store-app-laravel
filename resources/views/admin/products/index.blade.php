@extends('layout.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Product List</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Product Row -->
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('admin.products.delete', parameters: $product->id) }}"
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
