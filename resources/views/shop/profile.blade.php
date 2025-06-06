
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
        }
        .wrapper {
            display: flex;
            flex-direction: row;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            width: 20%;
            background-color: #b9c3339e;
            padding: 20px;
            border-right: 1px solid #e0e0e0;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 8px 0;
        }
        .list-unstyled.components {
            padding-left: 0;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
        }
        .sidebar ul li a:hover {
            color: #0d6efd; /* Bootstrap primary blue */
        }
        .sidebar ul li a.active {
            color: #0d6efd;
            font-weight: bold;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .profile-card {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-card .form-label {
            font-weight: bold;
            color: #6c757d; /* Muted grey for labels */
        }
        .profile-card .form-control-plaintext {
            padding-left: 0;
        }
        .btn-custom {
            background-color: #28a745; /* Green color for buttons */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .btn-change-password {
            background-color: #17a2b8; /* Info blue for change password */
        }
        .btn-change-password:hover {
            background-color: #138496;
        }
        .section-title {
            color: #6c757d;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.1em;
            font-weight: bold;
        }
        .navbar-top {
            background-color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .navbar-top .dropdown-toggle {
            text-decoration: none;
            color: #333;
        }
    </style>
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
                <li><a href="{{ url('/shop/cart') }}" class="fa-solid fa-cart-shopping">
                    
                    <span class="cart-count">0</span>
                </a>
            </li>
            </ul>
        </nav>

    <div class="navbar-top">
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="p-3">
                <p class="mb-4">Hello, payel00345</p>
                <div class="section-title">Manage My Account</div>
                <ul class="list-unstyled components">
                    <li><a href="#" class="active">My Profile</a></li>
                    <li><a href="#">Address Book</a></li>
                    <li><a href="#">My Payment Options</a></li>
                    <li><a href="#">Daraz Wallet</a></li>
                </ul>

                <div class="section-title">My Orders</div>
                <ul class="list-unstyled components">
                    <li><a href="#">My Returns</a></li>
                    <li><a href="#">My Cancellations</a></li>
                </ul>

                <div class="section-title">My Reviews</div>
                <ul class="list-unstyled components">
                    <li><a href="#">My Wishlist & Followed Stores</a></li>
                </ul>

                <div class="section-title">
                    <a href="#" style="color: #333; text-decoration: none;">Sell On Daraz</a>
                </div>
            </div>
        </nav>

        <div id="content" class="content">
            <div class="container-fluid">
                <h3 class="mb-4">My profile</h3>

                <div class="profile-card">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="fullName" class="form-label">Full Name</label>
                            <p class="form-control-plaintext">payel00345</p>
                        </div>
                        <div class="col-md-4">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <p class="form-control-plaintext mb-0">pa*******@gmail.com <a href="#" class="text-info text-decoration-none ms-2">Change</a></p>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="" id="marketingEmails">
                                <label class="form-check-label" for="marketingEmails">
                                    Receive marketing emails
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="mobile" class="form-label">Mobile</label>
                            <p class="form-control-plaintext mb-0">Please enter your mobile <a href="#" class="text-info text-decoration-none ms-2">Add</a></p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="birthday" class="form-label">Birthday</label>
                            <p class="form-control-plaintext">Please enter your birthday</p>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <p class="form-control-plaintext">Please enter your gender</p>
                        </div>
                    </div>

                    <div class="d-grid gap-2 col-md-6 mx-auto mt-4">
                        <button type="button" class="btn btn-info text-white btn-custom">EDIT PROFILE</button>
                        <button type="button" class="btn btn-info text-white btn-custom btn-change-password">CHANGE PASSWORD</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>