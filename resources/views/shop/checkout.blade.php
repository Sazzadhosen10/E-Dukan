<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout – E-Dukan</title>
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
                    @auth
                    <a href="{{ route('shop.cart') }}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-primary">{{ count(session('cart', [])) }}</span>
                    </a>
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
                    <li class="breadcrumb-item"><a href="{{ route('shop.cart') }}">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>

            <!-- Checkout Content -->
            <div class="row">
                <!-- Order Summary -->
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0"><i class="fas fa-credit-card me-2"></i>Order Summary</h4>
                        </div>
                        <div class="card-body">
                            @foreach($products as $item)
                            <div class="d-flex align-items-center mb-3 p-3 border rounded">
                                @if($item['product']->image)
                                    <img src="{{ asset($item['product']->image) }}" alt="{{ $item['product']->name }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;" class="rounded me-3">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" 
                                         style="width: 80px; height: 80px;">
                                        <i class="fas fa-image fa-2x text-muted"></i>
                                    </div>
                                @endif
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $item['product']->name }}</h6>
                                    <small class="text-muted">{{ $item['product']->category->name }}</small>
                                    <div class="mt-2">
                                        <span class="text-primary fw-bold">${{ number_format($item['product']->price, 2) }}</span>
                                        <span class="text-muted ms-3">Qty: {{ $item['quantity'] }}</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="h6 text-success">${{ number_format($item['subtotal'], 2) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Checkout Form -->
                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-shopping-bag me-2"></i>Complete Order</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h6>Order Total</h6>
                                <div class="d-flex justify-content-between">
                                    <span>Subtotal:</span>
                                    <span>${{ number_format($total, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Shipping:</span>
                                    <span>Free</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total:</span>
                                    <span class="h5 text-success">${{ number_format($total, 2) }}</span>
                                </div>
                            </div>

                            <form action="#" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Shipping Address</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter your shipping address" required></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" placeholder="Enter your phone number" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Payment Method</label>
                                    <select class="form-select" required>
                                        <option value="">Select payment method</option>
                                        <option value="cod">Cash on Delivery</option>
                                        <option value="card">Credit/Debit Card</option>
                                        <option value="bank">Bank Transfer</option>
                                    </select>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fas fa-lock me-2"></i>Place Order
                                    </button>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                <a href="{{ route('shop.cart') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</body>

</html> 