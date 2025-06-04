<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop – Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="header-top">
        <ul class="header-links">
            <li><a href=""></a>jbfhdsahfs</li>
            <li><a href=""></a>Login</li>
            <li><a href=""></a>Signup</li>
            <li><a href=""></a>Language</li>
        </ul>
    </div>
    <header class="header">
        <nav>
            <img class="logo-img" src="{{ asset('images/E_Dokan.jpg') }}" alt="E-Dukan Logo">
            <div class="search-container">
               <div class="logo"></div>
                 <input type="text" class="search-input" placeholder="Search in E-Dukan">
                    <button class="search-button"><i class="fas fa-search"></i></button>
            </div>
            <ul>
                <li><a href="{{ url('/shop') }}">Home</a></li>
                <li><a href="{{ url('/shop/category') }}">Electronics</a></li>
                <li><a href="{{ url('/shop/cart') }}" class="cart-icon">
                    Cart
                    <span class="cart-count">0</span>
                </a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Checkout</h2>
        <div class="checkout-container">
            <div class="checkout-form">
                <h3>Shipping Information</h3>
                <form>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">
                    </div>
                    <div class="form-group">
                        <label for="address">Shipping Address</label>
                        <textarea id="address" name="address" required placeholder="Enter your complete address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required placeholder="Enter your city">
                    </div>
                    <div class="form-group">
                        <label for="postal">Postal Code</label>
                        <input type="text" id="postal" name="postal" required placeholder="Enter postal code">
                    </div>
                    <button type="submit" class="place-order-btn">Place Order</button>
                </form>
            </div>
            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="summary-item">
                    <span>Subtotal</span>
                    <span>$99.99</span>
                </div>
                <div class="summary-item">
                    <span>Shipping</span>
                    <span>$5.00</span>
                </div>
                <div class="summary-item total">
                    <span>Total</span>
                    <span>$104.99</span>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Shop. All rights reserved.</p>
    </footer>
</body>
</html> 