<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} – E-Dukan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header Top -->
    <div class="header-top bg-dark text-white py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Welcome to E-Dukan!</span>
                </div>
                <div class="col-md-6 text-end">
                    @auth
                    <span>Hello, {{ Auth::user()->name }}!</span>
                    <a href="{{ route('logout') }}" class="text-white ms-2"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-white">Login</a>
                    <a href="{{ route('register') }}" class="text-white ms-2">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('shop.index') }}">
                    <img src="{{ asset('images/E_Dokan.jpg') }}" alt="E-Dukan Logo" height="40">
                </a>

                <div class="search-container flex-grow-1 mx-4">
                    <form action="{{ route('shop.search') }}" method="GET" class="d-flex">
                        <input type="text" name="q" class="form-control" placeholder="Search in E-Dukan" value="{{ request('q') }}">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                <div class="navbar-nav">
                    <a href="{{ route('shop.cart') }}" class="nav-link position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        @if($cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                    @auth
                    <a href="{{ route('shop.profile') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                    </a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('shop.category', $product->category->id) }}">{{ $product->category->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>

            <!-- Product Details -->
            <div class="row">
                <div class="col-md-6">
                    <div class="product-image">
                        @if($product->image)
                        <a href="{{ route('shop.product', $product->id) }}">
                            <img src="{{ asset($product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
                        </a>
                        @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                            <i class="fas fa-image fa-5x text-muted"></i>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="product-info">
                        <h1 class="h2 mb-3">{{ $product->name }}</h1>

                        <div class="mb-3">
                            <span class="badge bg-secondary">{{ $product->category->name }}</span>
                        </div>

                        <div class="price mb-4">
                            <span class="h3 text-primary">@money($product->price)</span>
                        </div>

                        <div class="stock mb-4">
                            @if($product->stock > 0)
                            <span class="badge bg-success">
                                <i class="fas fa-check"></i> In Stock ({{ $product->stock }} available)
                            </span>
                            @else
                            <span class="badge bg-danger">
                                <i class="fas fa-times"></i> Out of Stock
                            </span>
                            @endif
                        </div>

                        <div class="description mb-4">
                            <h5>Description</h5>
                            <p>{{ $product->description }}</p>
                        </div>

                        @if($product->stock > 0)
                        <div class="actions">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Qty</span>
                                        <input type="number" class="form-control" value="1" min="1" max="{{ $product->stock }}" id="quantity">
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex align-items-stretch">
                                    <form action="{{ route('cart.add', $product) }}" method="POST" class="me-2">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1" id="add-to-cart-quantity">
                                        <button type="submit" class="btn btn-primary btn-lg w-100" style="border-radius: 10px; font-weight: 700; box-shadow: 0 6px 14px rgba(44, 90, 160, 0.25)">
                                            <i class="fas fa-cart-plus"></i>
                                            <span class="ms-1">Add to Cart</span>
                                        </button>
                                    </form>
                                    <form action="{{ route('shop.checkout') }}" method="GET" class="me-2">
                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1" id="buy-now-quantity">
                                        <button type="submit" class="btn btn-success btn-lg w-100" style="border-radius: 10px; font-weight: 700; background: linear-gradient(135deg, #16a34a, #22c55e); border: none; box-shadow: 0 6px 14px rgba(22, 163, 74, 0.25)">
                                            <i class="fas fa-bolt"></i>
                                            <span class="ms-1">Buy Now</span>
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-outline-danger btn-lg">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        @guest
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            Please <a href="{{ route('login') }}">login</a> to add items to cart.
                        </div>
                        @endguest
                        @else
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                            This product is currently out of stock.
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if($relatedProducts->count() > 0)
            <div class="related-products mt-5">
                <h3 class="mb-4">Related Products</h3>
                <div class="row">
                    @foreach($relatedProducts as $relatedProduct)
                    @php $productUrl = request()->getSchemeAndHttpHost() . request()->getBaseUrl() . '/shop/product/' . $relatedProduct->id; @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 position-relative" data-href="{{ $productUrl }}" style="cursor: pointer;">
                            @if($relatedProduct->image)
                            <a href="{{ $productUrl }}">
                                <img src="{{ asset($relatedProduct->image) }}" class="card-img-top" alt="{{ $relatedProduct->name }}" style="height: 200px; object-fit: cover;">
                            </a>
                            @else
                            <a href="{{ $productUrl }}" class="text-decoration-none">
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            </a>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title">
                                    <a href="{{ $productUrl }}" class="text-decoration-none text-dark">{{ $relatedProduct->name }}</a>
                                </h6>
                                <p class="card-text text-muted small">{{ Str::limit($relatedProduct->description, 60) }}</p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h6 text-primary">@money($relatedProduct->price)</span>
                                        <small class="text-muted">Stock: {{ $relatedProduct->stock }}</small>
                                    </div>
                                    <div class="d-grid mt-2">
                                        <a href="{{ $productUrl }}" class="btn btn-outline-primary btn-sm" onclick="window.location.href='{{ $productUrl }}'; return false;">View Details</a>
                                    </div>
                                </div>
                                <a href="{{ $productUrl }}" class="stretched-link" aria-label="View {{ $relatedProduct->name }}"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2024 E-Dukan. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="text-white me-3">Privacy Policy</a>
                    <a href="#" class="text-white">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            const qtyInput = document.getElementById('quantity');
            const addToCartQty = document.getElementById('add-to-cart-quantity');
            const buyNowQty = document.getElementById('buy-now-quantity');
            if (qtyInput && addToCartQty && buyNowQty) {
                const sync = () => {
                    addToCartQty.value = qtyInput.value || 1;
                    buyNowQty.value = qtyInput.value || 1;
                };
                qtyInput.addEventListener('input', sync);
                qtyInput.addEventListener('change', sync);
                sync();
            }
            // Make entire related product card clickable as a fallback if overlays block anchors
            document.querySelectorAll('.related-products .card[data-href]').forEach(function(card) {
                card.addEventListener('click', function(e) {
                    const tag = e.target.tagName.toLowerCase();
                    if (tag === 'a' || tag === 'button' || e.target.closest('a') || e.target.closest('button')) {
                        return;
                    }
                    const href = card.getAttribute('data-href');
                    if (href) {
                        window.location.href = href;
                    }
                });
            });
        })();
    </script>
</body>

</html>
