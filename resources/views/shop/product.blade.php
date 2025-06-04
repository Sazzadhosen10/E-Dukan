<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop – Product Detail</title>
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
        <div class="product-detail">
            <div class="product-image">
                <img src="{{ asset('images/product1.jpg') }}" alt="Product 1">
            </div>
            <div class="product-info">
                <h2>Product 1</h2>
                <p class="price">$99.99</p>
                <p class="description">This is a detailed description of the product. It includes all the important features and specifications that customers need to know. The product is made with high-quality materials and comes with a warranty.</p>
                <div class="product-meta">
                    <p><strong>Availability:</strong> In Stock</p>
                    <p><strong>Category:</strong> Electronics</p>
                </div>
                <div class="product-actions">
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Shop. All rights reserved.</p>
    </footer>
</body>
</html> 