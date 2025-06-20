<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Dukan – Shop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <div class="header-top bg-dark text-white">
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
                    @auth
                    <a href="{{ route('shop.cart') }}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-primary">0</span>
                    </a>
                    <a href="{{ route('shop.profile') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                    </a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Slider Section -->
        <section class="hero-slider mb-5">
            <div class="swiper heroSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="hero-slide bg-primary text-white d-flex align-items-center" style="height: 400px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="display-4 fw-bold">Welcome to E-Dukan</h1>
                                        <p class="lead">Discover amazing products at great prices</p>
                                        <a href="{{ route('shop.category') }}" class="btn btn-light btn-lg">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero-slide bg-success text-white d-flex align-items-center" style="height: 400px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="display-4 fw-bold">Electronics Sale</h1>
                                        <p class="lead">Up to 50% off on latest gadgets</p>
                                        <a href="{{ route('shop.category', 1) }}" class="btn btn-light btn-lg">Browse Electronics</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero-slide bg-info text-white d-flex align-items-center" style="height: 400px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="display-4 fw-bold">Fashion Trends</h1>
                                        <p class="lead">Latest clothing and accessories</p>
                                        <a href="{{ route('shop.category', 2) }}" class="btn btn-light btn-lg">Explore Fashion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        <!-- Categories Section -->
        <section class="categories mb-5">
            <div class="container">
                <h2 class="text-center mb-4">Shop by Categories</h2>
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-2 col-sm-4 col-6 mb-3">
                        <a href="{{ route('shop.category', $category->id) }}" class="text-decoration-none">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <i class="fas fa-tag fa-2x text-primary mb-2"></i>
                                    <h6 class="card-title">{{ $category->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section class="featured-products">
            <div class="container">
                <h2 class="text-center mb-4">Featured Products</h2>
                <div class="row">
                    @forelse($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            @if($product->image)
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                            @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($product->description, 80) }}</p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h5 text-primary">${{ number_format($product->price, 2) }}</span>
                                        <small class="text-muted">Stock: {{ $product->stock }}</small>
                                    </div>
                                    <div class="d-grid mt-2">
                                        <a href="{{ route('shop.product', $product->id) }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p>No products available at the moment.</p>
                    </div>
                    @endforelse
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('shop.category') }}" class="btn btn-outline-primary btn-lg">View All Products</a>
                </div>
            </div>
        </section>
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
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".heroSwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            },
            loop: true,
        });
    </script>
</body>

</html>