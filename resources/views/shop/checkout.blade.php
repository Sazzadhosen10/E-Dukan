<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
=======
    <meta name="csrf-token" content="{{ csrf_token() }}">
>>>>>>> c7ecb9937264f1b499d05986f244f8e0bc6b429b
    <title>Checkout – E-Dukan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<<<<<<< HEAD

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
=======

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
>>>>>>> c7ecb9937264f1b499d05986f244f8e0bc6b429b
                </div>
            </div>
        </div>
    </div>

    <header class="header bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('shop.index') }}">
                    <img src="{{ asset('images/E_Dokan.jpg') }}" alt="E-Dukan Logo" class="logo-img" height="60" style="max-width: 200px; object-fit: contain;">
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
                    <li class="breadcrumb-item"><a href="{{ route('shop.cart') }}">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>

            <h2 class="mb-4">Checkout</h2>

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Shipping Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-shipping-fast me-2"></i>Shipping Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="shipping_name" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control @error('shipping_name') is-invalid @enderror"
                                            id="shipping_name" name="shipping_name"
                                            value="{{ old('shipping_name', $user->name) }}" required>
                                        @error('shipping_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="shipping_email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control @error('shipping_email') is-invalid @enderror"
                                            id="shipping_email" name="shipping_email"
                                            value="{{ old('shipping_email', $user->email) }}" required>
                                        @error('shipping_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="shipping_phone" class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control @error('shipping_phone') is-invalid @enderror"
                                            id="shipping_phone" name="shipping_phone"
                                            value="{{ old('shipping_phone') }}" required>
                                        @error('shipping_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="shipping_city" class="form-label">City *</label>
                                        <input type="text" class="form-control @error('shipping_city') is-invalid @enderror"
                                            id="shipping_city" name="shipping_city"
                                            value="{{ old('shipping_city') }}" required>
                                        @error('shipping_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="shipping_address" class="form-label">Address *</label>
                                    <textarea class="form-control @error('shipping_address') is-invalid @enderror"
                                        id="shipping_address" name="shipping_address" rows="3"
                                        required>{{ old('shipping_address') }}</textarea>
                                    @error('shipping_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="shipping_postal_code" class="form-label">Postal Code *</label>
                                        <input type="text" class="form-control @error('shipping_postal_code') is-invalid @enderror"
                                            id="shipping_postal_code" name="shipping_postal_code"
                                            value="{{ old('shipping_postal_code') }}" required>
                                        @error('shipping_postal_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="shipping_country" class="form-label">Country *</label>
                                        <select class="form-select @error('shipping_country') is-invalid @enderror"
                                            id="shipping_country" name="shipping_country" required>
                                            <option value="Bangladesh" {{ old('shipping_country', 'Bangladesh') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                            <option value="India" {{ old('shipping_country') == 'India' ? 'selected' : '' }}>India</option>
                                            <option value="Pakistan" {{ old('shipping_country') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                            <option value="Other" {{ old('shipping_country') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('shipping_country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="notes" class="form-label">Order Notes (Optional)</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror"
                                        id="notes" name="notes" rows="2"
                                        placeholder="Any special instructions for delivery...">{{ old('notes') }}</textarea>
                                    @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-credit-card me-2"></i>Payment Method</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method"
                                        id="cash_on_delivery" value="cash_on_delivery" checked>
                                    <label class="form-check-label" for="cash_on_delivery">
                                        <i class="fas fa-truck me-2"></i>Cash on Delivery
                                    </label>
                                    <div class="text-muted small mt-1">Pay when your order is delivered to your doorstep</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Order Summary -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Order Summary</h5>
                            </div>
                            <div class="card-body">
                                @foreach($cartItems as $item)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                                        <small class="text-muted">Qty: {{ $item->quantity }} × ${{ number_format($item->price, 2) }}</small>
                                    </div>
                                    <span class="fw-bold">${{ number_format($item->total, 2) }}</span>
                                </div>
                                @endforeach

                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span>Subtotal:</span>
                                    <span>${{ number_format($total, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Shipping:</span>
                                    <span class="text-success">Free</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Tax:</span>
                                    <span>$0.00</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <strong>Total:</strong>
                                    <strong class="text-primary">${{ number_format($total, 2) }}</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Place Order Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-check me-2"></i>Place Order
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class="fas fa-lock me-1"></i>Your information is secure and encrypted
                            </small>
                        </div>

                        <div class="text-center mt-2">
                            <a href="{{ route('shop.cart') }}" class="text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i>Back to Cart
                            </a>
                        </div>
                    </div>
                </div>
            </form>
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

<<<<<<< HEAD
</html>
=======
</html> 
>>>>>>> c7ecb9937264f1b499d05986f244f8e0bc6b429b
