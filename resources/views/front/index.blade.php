<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Our Products</h1>

        <!-- Category Filter -->
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <div class="input-group">
                    <label class="input-group-text" for="categoryFilter">Filter by Category:</label>
                    <select class="form-select" id="categoryFilter" onchange="filterProducts()">
                        <option value="all" selected>All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="row" id="productGrid">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4 product-card" data-category="{{ $product->category->id }}">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-container" style="overflow: hidden;">
                            @if ($product->image_url)
                                <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                            @else
                                <img src="https://via.placeholder.com/300" class="card-img-top"
                                    alt="{{ $product->name }}">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"
                                style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden; text-overflow: ellipsis;">
                                {{ $product->description }}
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Price:</strong>
                                    ${{ number_format($product->price, 2) }}</li>
                                <li class="list-group-item"><strong>Quantity:</strong> {{ $product->quantity }}</li>
                                <li class="list-group-item"><strong>Category:</strong> {{ $product->category->name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filterProducts() {
            let selectedCategory = document.getElementById('categoryFilter').value;
            let products = document.querySelectorAll('.product-card');

            products.forEach(product => {
                if (selectedCategory === 'all' || product.getAttribute('data-category') === selectedCategory) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>
