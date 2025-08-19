<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Dukan – Your Premier Online Shopping Destination</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Shop the latest fashion, electronics, and home decor at E-Dukan. Free shipping, easy returns, and 24/7 customer support.">
    <meta name="keywords" content="online shopping, ecommerce, fashion, electronics, home decor, deals, discounts">

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

        /* Hero Slider Styles */
        .hero-slider {
            height: 70vh;
            width: 100%;
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .swiper-slide img.slider-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        /* Ensure smooth slide transitions */
        .swiper-wrapper {
            transition-timing-function: ease-out;
        }

        .swiper-slide-active {
            z-index: 2;
        }

        .swiper-slide-prev,
        .swiper-slide-next {
            z-index: 1;
        }

        /* Alternative image fitting options - you can switch between these */
        .swiper-slide img.fit-contain {
            object-fit: contain;
            background: rgba(0, 0, 0, 0.1);
        }

        .swiper-slide img.fit-fill {
            object-fit: fill;
        }

        .swiper-slide img.fit-scale-down {
            object-fit: scale-down;
        }

        .slide-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4));
            z-index: 2;
        }

        .slide-content {
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 0 20px;
            position: relative;
            z-index: 3;
        }

        .slide-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .slide-content p {
            font-size: 1.4rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .slide-btn {
            background: var(--accent-color);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.4);
        }

        .slide-btn:hover {
            background: #e55a2b;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.6);
            color: white;
        }

        /* Swiper Navigation Styles */
        .swiper-button-next,
        .swiper-button-prev {
            color: white;
            background: rgba(0, 0, 0, 0.3);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            transition: all 0.3s ease;
            z-index: 1000;
            cursor: pointer;
            display: flex !important;
            align-items: center;
            justify-content: center;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(0, 0, 0, 0.6);
            transform: scale(1.1);
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        .swiper-button-next.swiper-button-disabled,
        .swiper-button-prev.swiper-button-disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .swiper-pagination {
            z-index: 1000;
        }

        .swiper-pagination-bullet {
            background: white;
            opacity: 0.7;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
            background: var(--accent-color);
            transform: scale(1.2);
        }

        /* Value Proposition Section */
        .value-prop {
            background: var(--secondary-color);
            padding: 60px 0;
        }

        .value-item {
            text-align: center;
            padding: 30px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
            transition: transform 0.3s ease;
        }

        .value-item:hover {
            transform: translateY(-5px);
        }

        .value-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        /* Featured Categories */
        .featured-categories {
            padding: 80px 0;
        }

        .category-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            height: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        .category-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: 30px 20px 20px;
            text-align: center;
        }

        .category-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .category-count {
            font-size: 0.9rem;
            opacity: 0.9;
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
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .btn-add-cart {
            grid-column: 1 / span 1;
            background: var(--primary-color);
            color: #fff;
            border: none;
            padding: 10px 14px;
            border-radius: 10px;
            font-weight: 700;
            box-shadow: 0 6px 14px rgba(44, 90, 160, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.3s ease;
        }

        .btn-add-cart:hover {
            background: #224a8e;
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(44, 90, 160, 0.35);
        }

        .btn-buy-now {
            grid-column: 2 / span 1;
            background: linear-gradient(135deg, #ff6b35, #ff8a35);
            color: #fff;
            border: none;
            padding: 10px 14px;
            border-radius: 10px;
            font-weight: 700;
            box-shadow: 0 6px 14px rgba(255, 107, 53, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-buy-now:hover {
            background: linear-gradient(135deg, #e55a2b, #ff7a2b);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.35);
        }

        .btn-view-details {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 600;
            opacity: 0.9;
            transition: color 0.2s ease, opacity 0.2s ease;
        }

        .btn-view-details:hover {
            color: var(--primary-color);
            opacity: 1;
            text-decoration: underline;
        }

        /* Testimonials */
        .testimonials {
            background: var(--secondary-color);
            padding: 80px 0;
        }

        .testimonial-card {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
        }

        .testimonial-text {
            font-style: italic;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 25px;
            color: var(--text-dark);
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .author-info h6 {
            margin: 0;
            font-weight: 600;
            color: var(--text-dark);
        }

        .author-info small {
            color: var(--text-light);
        }

        /* Newsletter */
        .newsletter {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            color: white;
            padding: 80px 0;
        }

        .newsletter-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            gap: 15px;
        }

        .newsletter-form input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
        }

        .newsletter-form button {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            white-space: nowrap;
            transition: all 0.3s ease;
        }

        .newsletter-form button:hover {
            background: #e55a2b;
        }

        /* Footer */
        .footer {
            background: #1a202c;
            color: white;
            padding: 60px 0 30px;
        }

        .footer-section h5 {
            color: white;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .footer-link {
            color: #a0aec0;
            text-decoration: none;
            display: block;
            padding: 5px 0;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: white;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--accent-color);
            color: white;
            transform: translateY(-2px);
        }

        .payment-icons img {
            height: 30px;
            margin: 0 10px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .payment-icons img:hover {
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .slide-content h1 {
                font-size: 2.5rem;
            }

            .slide-content p {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .hero-slider {
                height: 50vh;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 40px;
                height: 40px;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .hero-slider {
                height: 40vh;
            }

            .slide-content h1 {
                font-size: 2rem;
            }

            .slide-content p {
                font-size: 1rem;
            }

            .slide-btn {
                padding: 12px 30px;
                font-size: 1rem;
            }
        }

        /* Override any framework conflicts */
        .hero-slider * {
            box-sizing: border-box;
        }

        .hero-slider .swiper-wrapper {
            width: 100%;
            height: 100%;
        }

        .hero-slider .swiper-slide {
            flex-shrink: 0;
            width: 100%;
            height: 100%;
            position: relative;
            transition-property: transform;
        }

        /* Ensure no Bootstrap container conflicts */
        .hero-slider .container,
        .hero-slider .container-fluid {
            max-width: none;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        /* Force full width for slider section */
        .hero-slider {
            width: 100vw !important;
            max-width: 100vw !important;
            margin-left: calc(-50vw + 50%) !important;
            margin-right: calc(-50vw + 50%) !important;
        }

        /* Ensure touch events work properly */
        .hero-slider {
            touch-action: pan-y pinch-zoom;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .swiper-slide {
            touch-action: pan-y pinch-zoom;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Ensure swiper container is properly sized */
        .hero-swiper {
            width: 100% !important;
            height: 100% !important;
            overflow: hidden;
        }

        /* Fix any potential z-index issues */
        .swiper-wrapper {
            z-index: 1;
        }

        .swiper-slide {
            z-index: 1;
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
                                @foreach($categories->take(8) as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('shop.category', $category->id) }}">
                                        {{ $category->name }}
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

    <!-- Hero Slider -->
    @if($sliders->isNotEmpty())
    <section class="hero-slider">
        
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                @foreach($sliders as $index => $slider)
                <div class="swiper-slide" data-slide-index="{{ $index }}">
                    @if($slider->image)
                    <img src="{{ $slider->image }}" alt="{{ $slider->title }}" loading="lazy" class="slider-image">
                    @else
                    <div class="slide-placeholder" style="width: 100%; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: absolute; top: 0; left: 0; z-index: 1;"></div>
                    @endif
                    <div class="slide-overlay"></div>
                    <div class="slide-content animate__animated animate__fadeInUp">
                        <h1>{{ $slider->title }}</h1>
                        @if($slider->description)
                        <p>{{ $slider->description }}</p>
                        @endif
                        @if($slider->button_text && $slider->button_link)
                        <a href="{{ $slider->button_link }}" class="slide-btn">{{ $slider->button_text }}</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @if($sliders->count() > 1)
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            @endif
        </div>
    </section>
    @else
    <section class="hero-slider" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white;">
        <div style="text-align: center;">
            <h1>No Sliders Found</h1>
            <p>Please add some sliders in the admin panel</p>
        </div>
    </section>
    @endif

    <!-- Value Proposition -->
    <section class="value-prop">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h5>Free Shipping</h5>
                        <p class="text-muted mb-0">Free shipping on orders over $50</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <h5>Easy Returns</h5>
                        <p class="text-muted mb-0">30-day hassle-free returns</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5>Secure Payment</h5>
                        <p class="text-muted mb-0">100% secure payment processing</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5>24/7 Support</h5>
                        <p class="text-muted mb-0">Round-the-clock customer service</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    @if($featuredCategories->isNotEmpty())
    <section class="featured-categories">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Shop by Category</h2>
                <p class="section-subtitle">Discover our wide range of products across different categories</p>
            </div>
            <div class="row g-4">
                @foreach($featuredCategories as $category)
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('shop.category', $category->id) }}" class="text-decoration-none">
                        <div class="category-card">
                            @if($category->image)
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                            @endif
                            <div class="category-overlay">
                                <div class="category-title">{{ $category->name }}</div>
                                <div class="category-count">{{ $category->products->count() }} Products</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Featured Products -->
    @if($featuredProducts->isNotEmpty())
    <section class="product-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Featured Products</h2>
                <p class="section-subtitle">Handpicked products just for you</p>
            </div>
            <div class="row g-4">
                @foreach($featuredProducts as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <a href="{{ route('shop.product', $product->id) }}" class="d-block">
                                @if($product->image && file_exists(public_path($product->image)))
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                @else
                                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                                @endif
                            </a>
                            <div class="product-badge">Featured</div>
                        </div>
                        <div class="product-info">
                            <h6 class="product-title"><a href="{{ route('shop.product', $product->id) }}" class="text-decoration-none text-dark">{{ Str::limit($product->name, 50) }}</a></h6>
                            <div class="product-price">@money($product->price)</div>
                            <div class="product-actions">
                                @if($product->stock > 0)
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn-add-cart w-100">
                                        <i class="fas fa-cart-plus"></i>
                                        <span class="ms-1">Add to Cart</span>
                                    </button>
                                </form>
                                <a href="{{ route('shop.checkout') }}?product={{ $product->id }}&quantity=1" class="btn-buy-now w-100">
                                    <i class="fas fa-bolt"></i>
                                    <span>Buy Now</span>
                                </a>
                                @else
                                <button class="btn-add-cart w-100" disabled>
                                    <i class="fas fa-ban"></i>
                                    <span class="ms-1">Out of Stock</span>
                                </button>
                                <a href="{{ route('shop.product', $product->id) }}" class="btn-buy-now w-100 disabled" aria-disabled="true" tabindex="-1">
                                    <i class="fas fa-bolt"></i>
                                    <span>Buy Now</span>
                                </a>
                                @endif
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('shop.product', $product->id) }}" class="btn-view-details">
                                    <span>View details</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- New Arrivals -->
    @if($newArrivals->isNotEmpty())
    <section id="new-arrivals" class="product-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">New Arrivals</h2>
                <p class="section-subtitle">Check out our latest products</p>
            </div>
            <div class="row g-4">
                @foreach($newArrivals as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <a href="{{ route('shop.product', $product->id) }}" class="d-block">
                                @if($product->image && file_exists(public_path($product->image)))
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                @else
                                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                                @endif
                            </a>
                            <div class="product-badge">New</div>
                        </div>
                        <div class="product-info">
                            <h6 class="product-title"><a href="{{ route('shop.product', $product->id) }}" class="text-decoration-none text-dark">{{ Str::limit($product->name, 50) }}</a></h6>
                            <div class="product-price">@money($product->price)</div>
                            <div class="product-actions">
                                @if($product->stock > 0)
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn-add-cart w-100">
                                        <i class="fas fa-cart-plus"></i>
                                        <span class="ms-1">Add to Cart</span>
                                    </button>
                                </form>
                                <a href="{{ route('shop.checkout') }}?product={{ $product->id }}&quantity=1" class="btn-buy-now w-100">
                                    <i class="fas fa-bolt"></i>
                                    <span>Buy Now</span>
                                </a>
                                @else
                                <button class="btn-add-cart w-100" disabled>
                                    <i class="fas fa-ban"></i>
                                    <span class="ms-1">Out of Stock</span>
                                </button>
                                <a href="{{ route('shop.product', $product->id) }}" class="btn-buy-now w-100 disabled" aria-disabled="true" tabindex="-1">
                                    <i class="fas fa-bolt"></i>
                                    <span>Buy Now</span>
                                </a>
                                @endif
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('shop.product', $product->id) }}" class="btn-view-details">
                                    <span>View details</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Best Sellers -->
    @if($bestSellers->isNotEmpty())
    <section id="best-sellers" class="product-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Best Sellers</h2>
                <p class="section-subtitle">Most popular products among our customers</p>
            </div>
            <div class="row g-4">
                @foreach($bestSellers as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <a href="{{ route('shop.product', $product->id) }}" class="d-block">
                                @if($product->image && file_exists(public_path($product->image)))
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                @else
                                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                                @endif
                            </a>
                            <div class="product-badge">Best Seller</div>
                        </div>
                        <div class="product-info">
                            <h6 class="product-title"><a href="{{ route('shop.product', $product->id) }}" class="text-decoration-none text-dark">{{ Str::limit($product->name, 50) }}</a></h6>
                            <div class="product-price">@money($product->price)</div>
                            <div class="product-actions">
                                @if($product->stock > 0)
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn-add-cart w-100">
                                        <i class="fas fa-cart-plus"></i>
                                        <span class="ms-1">Add to Cart</span>
                                    </button>
                                </form>
                                <a href="{{ route('shop.checkout') }}?product={{ $product->id }}&quantity=1" class="btn-buy-now w-100">
                                    <i class="fas fa-bolt"></i>
                                    <span>Buy Now</span>
                                </a>
                                @else
                                <button class="btn-add-cart w-100" disabled>
                                    <i class="fas fa-ban"></i>
                                    <span class="ms-1">Out of Stock</span>
                                </button>
                                <a href="{{ route('shop.product', $product->id) }}" class="btn-buy-now w-100 disabled" aria-disabled="true" tabindex="-1">
                                    <i class="fas fa-bolt"></i>
                                    <span>Buy Now</span>
                                </a>
                                @endif
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('shop.product', $product->id) }}" class="btn-view-details">
                                    <span>View details</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Customer Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">What Our Customers Say</h2>
                <p class="section-subtitle">Real feedback from real customers</p>
            </div>
            <div class="row g-4">
                <!-- Sample testimonials - you can make these admin-controlled later -->
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Amazing quality products and super fast delivery! I've been shopping here for months and never disappointed."
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">JS</div>
                            <div class="author-info">
                                <h6>John Smith</h6>
                                <small>Verified Customer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Excellent customer service and easy returns. The team really cares about customer satisfaction."
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">MJ</div>
                            <div class="author-info">
                                <h6>Maria Johnson</h6>
                                <small>Verified Customer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Great variety of products at competitive prices. My go-to online store for all my needs!"
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">RB</div>
                            <div class="author-info">
                                <h6>Robert Brown</h6>
                                <small>Verified Customer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="newsletter">
        <div class="container text-center">
            <h2 class="mb-3">Stay Updated</h2>
            <p class="mb-4 fs-5">Get exclusive deals and latest updates straight to your inbox</p>
            <div class="newsletter-form">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe Now</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h5>E-Dukan</h5>
                        <p class="text-muted">Your premier destination for online shopping. Quality products, great prices, exceptional service.</p>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h5>Quick Links</h5>
                        <a href="{{ route('shop.index') }}" class="footer-link">Home</a>
                        <a href="#" class="footer-link">About Us</a>
                        <a href="#" class="footer-link">Contact</a>
                        <a href="#" class="footer-link">FAQs</a>
                        <a href="#" class="footer-link">Blog</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h5>Customer Service</h5>
                        <a href="#" class="footer-link">Shipping Info</a>
                        <a href="#" class="footer-link">Returns Policy</a>
                        <a href="#" class="footer-link">Size Guide</a>
                        <a href="#" class="footer-link">Track Your Order</a>
                        <a href="#" class="footer-link">Support Center</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h5>Contact Info</h5>
                        <div class="footer-link"><i class="fas fa-map-marker-alt me-2"></i>123 Commerce St, City, State 12345</div>
                        <div class="footer-link"><i class="fas fa-phone me-2"></i>+1-800-123-4567</div>
                        <div class="footer-link"><i class="fas fa-envelope me-2"></i>support@edukan.com</div>

                        <h6 class="mt-4 mb-3">We Accept</h6>
                        <div class="payment-icons">
                            <i class="fab fa-cc-visa fa-2x me-2"></i>
                            <i class="fab fa-cc-mastercard fa-2x me-2"></i>
                            <i class="fab fa-cc-paypal fa-2x me-2"></i>
                            <i class="fab fa-cc-stripe fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 border-secondary">

            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-muted">&copy; 2024 E-Dukan. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="footer-link me-3">Privacy Policy</a>
                    <a href="#" class="footer-link me-3">Terms of Service</a>
                    <a href="#" class="footer-link">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    
    <!-- Fallback Swiper JS if CDN fails -->
    <script>
        // Check if Swiper loaded properly
        if (typeof Swiper === 'undefined') {
            console.log('Primary Swiper CDN failed, trying fallback...');
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js';
            script.onload = function() {
                console.log('Fallback Swiper loaded successfully');
                initializeSlider();
            };
            script.onerror = function() {
                console.error('All Swiper CDNs failed');
            };
            document.head.appendChild(script);
        } else {
            console.log('Primary Swiper CDN loaded successfully');
            initializeSlider();
        }
        
        function initializeSlider() {
            // Initialize Swiper for hero slider
            @if($sliders->isNotEmpty())
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM loaded, initializing slider...');
                console.log('Sliders count:', {{ $sliders->count() }});
                
                // Store swiper instance globally to prevent conflicts
                window.heroSwiperInstance = null;
                
                try {
                    // Wait a bit for all resources to load
                    setTimeout(function() {
                        const swiperContainer = document.querySelector('.hero-swiper');
                        if (!swiperContainer) {
                            console.error('Swiper container not found');
                            return;
                        }
                        
                        console.log('Swiper container found:', swiperContainer);
                        
                        // Check if we have multiple slides
                        const slides = document.querySelectorAll('.swiper-slide');
                        console.log('Found slides:', slides.length);
                        
                        if (slides.length <= 1) {
                            console.log('Only one slide found, disabling loop and autoplay');
                        }
                        
                        // Destroy existing swiper instance if it exists
                        if (window.heroSwiperInstance && window.heroSwiperInstance.destroy) {
                            console.log('Destroying existing swiper instance');
                            window.heroSwiperInstance.destroy(true, true);
                        }
                        
                        const heroSwiper = new Swiper('.hero-swiper', {
                            loop: slides.length > 1,
                            autoplay: slides.length > 1 ? {
                                delay: 5000,
                                disableOnInteraction: false,
                                pauseOnMouseEnter: true,
                                stopOnLastSlide: false,
                                waitForTransition: false
                            } : false,
                            effect: 'slide', // Changed from 'fade' to 'slide' for better compatibility
                            speed: 800,
                            allowTouchMove: true,
                            grabCursor: true,
                            watchSlidesProgress: true,
                            watchSlidesVisibility: true,
                            observer: true,
                            observeParents: true,
                            slidesPerView: 1,
                            spaceBetween: 0,
                            pagination: slides.length > 1 ? {
                                el: '.swiper-pagination',
                                clickable: true,
                                dynamicBullets: true
                            } : false,
                            navigation: slides.length > 1 ? {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            } : false,
                            lazy: false, // Disabled lazy loading to prevent issues
                            // Ensure proper responsive behavior
                            breakpoints: {
                                320: {
                                    slidesPerView: 1,
                                    spaceBetween: 0
                                },
                                768: {
                                    slidesPerView: 1,
                                    spaceBetween: 0
                                },
                                1024: {
                                    slidesPerView: 1,
                                    spaceBetween: 0
                                }
                            },
                            // Add event listeners for debugging
                            on: {
                                init: function() {
                                    console.log('Swiper initialized successfully');
                                    console.log('Total slides:', this.slides.length);
                                    console.log('Is loop enabled:', this.params.loop);
                                    console.log('Is autoplay enabled:', this.autoplay && this.autoplay.running);
                                    console.log('Navigation elements:', {
                                        next: this.navigation.nextEl,
                                        prev: this.navigation.prevEl
                                    });
                                    console.log('Pagination element:', this.pagination.el);
                                    
                                    // Store instance globally
                                    window.heroSwiperInstance = this;
                                    
                                    // Ensure autoplay is running
                                    if (this.autoplay && slides.length > 1) {
                                        setTimeout(() => {
                                            if (this.autoplay && !this.autoplay.running) {
                                                console.log('Starting autoplay manually');
                                                this.autoplay.start();
                                            }
                                        }, 1000);
                                    }
                                },
                                slideChange: function() {
                                    console.log('Slide changed to:', this.realIndex);
                                    console.log('Active slide:', this.activeIndex);
                                    console.log('Previous slide:', this.previousIndex);
                                },
                                slideChangeTransitionStart: function() {
                                    console.log('Slide change transition started');
                                },
                                slideChangeTransitionEnd: function() {
                                    console.log('Slide change transition ended');
                                },
                                touchStart: function() {
                                    console.log('Touch started');
                                },
                                touchEnd: function() {
                                    console.log('Touch ended');
                                },
                                beforeInit: function() {
                                    console.log('Before Swiper init');
                                },
                                afterInit: function() {
                                    console.log('After Swiper init');
                                    // Test navigation
                                    if (this.navigation.nextEl && this.navigation.prevEl) {
                                        console.log('Navigation elements found');
                                        this.navigation.nextEl.addEventListener('click', function() {
                                            console.log('Next button clicked');
                                        });
                                        this.navigation.prevEl.addEventListener('click', function() {
                                            console.log('Prev button clicked');
                                        });
                                    }
                                },
                                beforeDestroy: function() {
                                    console.log('Swiper being destroyed');
                                },
                                afterDestroy: function() {
                                    console.log('Swiper destroyed');
                                }
                            }
                        });

                        // Test if swiper is working
                        console.log('Swiper instance:', heroSwiper);
                        console.log('Swiper params:', heroSwiper.params);
                        
                        // Enable touch events explicitly
                        heroSwiper.allowTouchMove = true;
                        heroSwiper.grabCursor = true;
                        
                        // Store instance globally
                        window.heroSwiperInstance = heroSwiper;
                        
                        // Add periodic health check for swiper
                        setInterval(function() {
                            if (window.heroSwiperInstance) {
                                // Check if swiper is still responsive
                                try {
                                    const currentIndex = window.heroSwiperInstance.activeIndex;
                                    const isAutoplayRunning = window.heroSwiperInstance.autoplay ? window.heroSwiperInstance.autoplay.running : false;
                                    
                                    // If autoplay should be running but isn't, restart it
                                    if (slides.length > 1 && !isAutoplayRunning && window.heroSwiperInstance.autoplay) {
                                        console.log('Autoplay stopped, restarting...');
                                        window.heroSwiperInstance.autoplay.start();
                                    }
                                    
                                    // Log status every 30 seconds
                                    if (Date.now() % 30000 < 1000) {
                                        console.log('Swiper health check - Active index:', currentIndex, 'Autoplay running:', isAutoplayRunning);
                                    }
                                } catch (error) {
                                    console.error('Swiper health check failed:', error);
                                    // Try to reinitialize if there's a critical error
                                    if (error.message.includes('destroyed') || error.message.includes('not initialized')) {
                                        console.log('Attempting to reinitialize swiper...');
                                        setTimeout(initializeSlider, 1000);
                                    }
                                }
                            }
                        }, 5000); // Check every 5 seconds
                        
                        // Test manual slide change after a delay
                        setTimeout(function() {
                            if (heroSwiper.slides.length > 1) {
                                console.log('Testing manual slide change...');
                                try {
                                    // Test going to next slide
                                    heroSwiper.slideNext();
                                    console.log('Manual slide change successful');
                                    
                                    // Test going back to first slide
                                    setTimeout(() => {
                                        heroSwiper.slideTo(0);
                                        console.log('Manual slide to first slide successful');
                                    }, 1000);
                                    
                                } catch (error) {
                                    console.error('Manual slide change failed:', error);
                                }
                            }
                        }, 3000);
                        
                        // Add manual navigation testing
                        const nextBtn = document.querySelector('.swiper-button-next');
                        const prevBtn = document.querySelector('.swiper-button-prev');
                        
                        if (nextBtn) {
                            nextBtn.addEventListener('click', function(e) {
                                console.log('Next button clicked manually');
                                e.preventDefault();
                                if (window.heroSwiperInstance && window.heroSwiperInstance.slideNext) {
                                    try {
                                        window.heroSwiperInstance.slideNext();
                                        console.log('Next slide navigation successful');
                                    } catch (error) {
                                        console.error('Next slide navigation failed:', error);
                                    }
                                }
                            });
                        }
                        
                        if (prevBtn) {
                            prevBtn.addEventListener('click', function(e) {
                                console.log('Prev button clicked manually');
                                e.preventDefault();
                                if (window.heroSwiperInstance && window.heroSwiperInstance.slidePrev) {
                                    try {
                                        window.heroSwiperInstance.slidePrev();
                                        console.log('Prev slide navigation successful');
                                    } catch (error) {
                                        console.error('Prev slide navigation failed:', error);
                                    }
                                }
                            });
                        }
                        
                    }, 200);
                    
                } catch (error) {
                    console.error('Error initializing hero slider:', error);
                    console.error('Error stack:', error.stack);
                }
            });
            @else
            console.log('No sliders found in database');
            @endif
        }

        // Add touch event debugging
        document.addEventListener('touchstart', function(e) {
            console.log('Touch event detected:', e.type);
        }, { passive: false });
        
        document.addEventListener('mousedown', function(e) {
            console.log('Mouse event detected:', e.type);
        });

        // Prevent page interactions from interfering with swiper
        document.addEventListener('visibilitychange', function() {
            if (window.heroSwiperInstance && window.heroSwiperInstance.autoplay) {
                if (document.hidden) {
                    console.log('Page hidden, pausing autoplay');
                    window.heroSwiperInstance.autoplay.stop();
                } else {
                    console.log('Page visible, resuming autoplay');
                    window.heroSwiperInstance.autoplay.start();
                }
            }
        });

        // Prevent window focus/blur from affecting swiper
        window.addEventListener('focus', function() {
            if (window.heroSwiperInstance && window.heroSwiperInstance.autoplay) {
                console.log('Window focused, resuming autoplay');
                window.heroSwiperInstance.autoplay.start();
            }
        });

        window.addEventListener('blur', function() {
            if (window.heroSwiperInstance && window.heroSwiperInstance.autoplay) {
                console.log('Window blurred, pausing autoplay');
                window.heroSwiperInstance.autoplay.stop();
            }
        });

        // Additional debugging for slider functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Check if slider elements exist
            const sliderSection = document.querySelector('.hero-slider');
            const swiperContainer = document.querySelector('.hero-swiper');
            const swiperWrapper = document.querySelector('.swiper-wrapper');
            const slides = document.querySelectorAll('.swiper-slide');
            
            console.log('Slider debugging:');
            console.log('- Slider section:', sliderSection);
            console.log('- Swiper container:', swiperContainer);
            console.log('- Swiper wrapper:', swiperWrapper);
            console.log('- Slides count:', slides.length);
            
            if (slides.length > 0) {
                slides.forEach((slide, index) => {
                    console.log(`- Slide ${index}:`, slide);
                    console.log(`  - Width:`, slide.offsetWidth);
                    console.log(`  - Height:`, slide.offsetHeight);
                    console.log(`  - Image:`, slide.querySelector('img'));
                });
            }
            
            // Test touch events on slider
            if (sliderSection) {
                sliderSection.addEventListener('touchstart', function(e) {
                    console.log('Slider touch start:', e);
                }, { passive: false });
                
                sliderSection.addEventListener('touchmove', function(e) {
                    console.log('Slider touch move:', e);
                }, { passive: false });
                
                sliderSection.addEventListener('touchend', function(e) {
                    console.log('Slider touch end:', e);
                }, { passive: false });
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Newsletter form submission
        document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                alert('Thank you for subscribing! We\'ll keep you updated with our latest offers.');
                this.querySelector('input[type="email"]').value = '';
            }
        });

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
