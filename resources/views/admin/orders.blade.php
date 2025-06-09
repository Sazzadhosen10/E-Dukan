<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – Orders</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-text mx-3">Admin Dashbord</div>
        </a>
        <div class="sidebar-divider"></div>
        
        <!-- Navigation -->
        <div class="sidebar-heading">Data</div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/categories">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/products">
                    <i class="fa-brands fa-product-hunt"></i>
                    <span>Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/orders">
                    <i class="fa-brands fa-first-order"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#collapseDefault" aria-expanded="false">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Default</span>
                    <i class="fas fa-fw fa-angle-down float-end"></i>
                </a>
                
                <div id="collapseDefault" class="collapse">
                    <div class="bg-white py-2 collapse-inner">
                        <ul>
                            <li><a class="collapse-item" href="/admin/categories">Categories</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/shop">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Pages</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Widgets</span>
                </a>
            </li>   
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Calendar</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-divider"></div>
        
        <div class="sidebar-heading">Documentation</div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Basics</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-puzzle-piece"></i>
                    <span>Components</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-paint-brush"></i>
                    <span>Make Dashkit Your Own!</span>
                </a>
            </li>
        </ul>
    </div>


    <main>
        <h2>Order Management</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1001</td>
                    <td>John Doe</td>
                    <td>$149.98</td>
                    <td>
                        <select class="status-select">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </td>
                    <td>
                        <button class="view-btn">View Details</button>
                    </td>
                </tr>
                <tr>
                    <td>#1002</td>
                    <td>Jane Smith</td>
                    <td>$99.99</td>
                    <td>
                        <select class="status-select">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed" selected>Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </td>
                    <td>
                        <button class="view-btn">View Details</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Shop Admin Panel. All rights reserved.</p>
    </footer>
</body>
</html> 