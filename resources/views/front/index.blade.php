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
            /* Ensure the image takes the full width of the card */
            height: 200px;
            /* Set a fixed height for consistency */
            object-fit: contain;
            /* Maintain aspect ratio and cover the area */
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

        <!-- Product Grid -->
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        <!-- Image Section -->
                        <div class="card-img-container" style="overflow: hidden;">
                            @if ($product->image_url)
                                <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                            @else
                                <img src="https://via.placeholder.com/300" class="card-img-top"
                                    alt="{{ $product->name }}">
                            @endif
                        </div>

                        <!-- Card Body -->
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
</body>

</html>
