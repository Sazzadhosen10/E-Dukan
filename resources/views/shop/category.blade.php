<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category ? $category->name . ' - ' : '' }}E-Dukan – Your Premier Online Shopping Destination</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Shop {{ $category ? $category->name : 'products' }} at E-Dukan. Free shipping, easy returns, and 24/7 customer support.">
    <meta name="keywords" content="online shopping, ecommerce, {{ $category ? $category->name : 'products' }}, deals, discounts">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Fallback Swiper CSS if CDN fails -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" onerror="this.onerror=null;this.href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css';">

    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #f8f9fa;
            --accent-color: #ff6b35;
            --text-dark: #2d3748;
            --text-light: #718096;
            --border-color: #e2e8f0;
        }

        /* Reset margins and padding for full-width slider */
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        /* Header Styles */
        .header-top {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }

        .main-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand img {
            height: 50px;
            object-fit: contain;
        }

        .search-container {
            max-width: 500px;
        }

        .search-container .form-control {
            border-right: none;
            border-radius: 25px 0 0 25px;
            padding: 12px 20px;
        }

        .search-container .btn {
            border-left: none;
            border-radius: 0 25px 25px 0;
            padding: 12px 20px;
        }

        .nav-icon {
            position: relative;
            font-size: 20px;
            color: var(--text-dark);
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s ease;
        }

        .nav-icon:hover {
            color: var(--primary-color);
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Product Sections */
        .product-section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--accent-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .product-info {
            padding: 25px;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .product-actions {
            display: flex;
            gap: 10px;
        }

        .btn-add-cart {
            flex: 1;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-add-cart:hover {
            background: #1e3a8a;
            color: white;
        }

        .btn-buy-now {
            width: 45px;
            height: 45px;
            border: 2px solid var(--accent-color);
            background: var(--accent-color);
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.8rem;
        }

        .btn-buy-now:hover {
            background: #e55a2b;
            border-color: #e55a2b;
            color: white;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header Top -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span><i class="fas fa-phone me-2"></i>+1-800-123-4567</span>
                    <span class="ms-3"><i class="fas fa-envelope me-2"></i>support@edukan.com</span>
                </div>
                <div class="col-md-6 text-end">
                    @auth
                    <span>Welcome back, {{ Auth::user()->name }}!</span>
                    <a href="{{ route('logout') }}" class="text-white ms-2 text-decoration-none"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-white text-decoration-none">
                        <i class="fas fa-sign-in-alt me-1"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="text-white ms-3 text-decoration-none">
                        <i class="fas fa-user-plus me-1"></i>Register
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('shop.index') }}">
                    <img src="{{ asset('images/E_Dokan.jpg') }}" alt="E-Dukan Logo">
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Main Navigation -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ route('shop.index') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold" href="#" id="categoriesDropdown"
                                role="button" data-bs-toggle="dropdown">Categories</a>
                            <ul class="dropdown-menu">
                                @foreach($categories->take(8) as $cat)
                                <li>
                                    <a class="dropdown-item" href="{{ route('shop.category', $cat->id) }}">
                                        {{ $cat->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#new-arrivals">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#best-sellers">Best Sellers</a>
                        </li>
                    </ul>

                    <!-- Search Bar -->
                    <div class="search-container mx-4">
                        <form action="{{ route('shop.search') }}" method="GET" class="d-flex">
                            <input type="text" name="q" class="form-control"
                                placeholder="Search products..." value="{{ request('q') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <!-- User Actions -->
                    <div class="d-flex align-items-center">
                        <a href="{{ route('shop.cart') }}" class="nav-icon">
                            <i class="fas fa-shopping-cart"></i>
                            @if($cartCount > 0)
                            <span class="cart-badge">{{ $cartCount }}</span>
                            @endif
                        </a>

                        @auth
                        <a href="{{ route('user.dashboard') }}" class="nav-icon">
                            <i class="fas fa-user"></i>
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="nav-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Category Products Section -->
    <section class="product-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ $category ? $category->name : 'All Products' }}</h2>
                <p class="section-subtitle">
                    @if($category)
                        Discover amazing {{ strtolower($category->name) }} products at unbeatable prices
                    @else
                        Browse our complete collection of products
                    @endif
                </p>
            </div>
            <div class="row g-4">
                @forelse($products as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            @if($product->image && file_exists(public_path($product->image)))
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            @else
                            <div class="d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                            @endif
                            <div class="product-badge">{{ $category ? $category->name : 'Product' }}</div>
                        </div>
                        <div class="product-info">
                            <h6 class="product-title">{{ Str::limit($product->name, 50) }}</h6>
                            <div class="product-price">${{ number_format($product->price, 2) }}</div>
                            <div class="product-actions">
                                <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-fill">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn-add-cart w-100">
                                        <i class="fas fa-cart-plus me-1"></i>Add to Cart
                                    </button>
                                </form>
                                <a href="{{ route('shop.checkout') }}?product={{ $product->id }}&quantity=1" class="btn-buy-now">
                                    <i class="fas fa-shopping-bag me-1"></i>Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <div class="py-5">
                        <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">No products found</h4>
                        <p class="text-muted">We couldn't find any products in this category.</p>
                        <a href="{{ route('shop.index') }}" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
            <div class="mt-6 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
            @endif
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add to cart success feedback
        document.querySelectorAll('.btn-add-cart').forEach(button => {
            button.addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check me-1"></i>Added!';
                this.classList.add('btn-success');
                this.classList.remove('btn-primary');

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-primary');
                }, 2000);
            });
        });
    </script>
</body>

</html>
