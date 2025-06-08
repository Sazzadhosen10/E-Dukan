<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/calender.css') }}">
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
                <a class="nav-link active" href="#">
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
                <a class="nav-link" href="#calendar">
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

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </button>
        </div>

        <!-- Stats Row -->
        <div class="row">
            <!-- Overview Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stat-label">Overview</div>
                                <div class="stat-value">Dashboard</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stat-label">Value</div>
                                <div class="stat-value">$24,500</div>
                                <div class="stat-change positive">
                                    <i class="fas fa-arrow-up"></i> 3.8%
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Hours Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stat-label">Total Hours</div>
                                <div class="stat-value">763.5</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exit % Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stat-label">Exit %</div>
                                <div class="stat-value">35.5%</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Stats Row -->
        <div class="row">
            <!-- Average Time Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stat-label">Average Time</div>
                                <div class="stat-value">2:37</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-stopwatch fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conversions Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stat-label">Conversions</div>
                                <div class="stat-value">40%</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-percent fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stat-label">Projects</div>
                                <div class="d-flex justify-content-between">
                                    <span>View all</span>
                                    <span>Sales</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Homepage Redesign Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stat-label">Homepage Redesign</div>
                                <div class="stat-value">$30k</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Conversions Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Conversions</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <div class="d-flex justify-content-between mb-3">
                                <span>40%</span>
                                <span>30%</span>
                                <span>20%</span>
                                <span>10%</span>
                                <span>0%</span>
                            </div>
                            <div class="progress mb-4" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 40%"></div>
                            </div>
                            <div class="d-flex justify-content-between small">
                                <span>Oct 1</span>
                                <span>Oct 2</span>
                                <span>Oct 3</span>
                                <span>Oct 4</span>
                                <span>Oct 5</span>
                                <span>Oct 6</span>
                                <span>Oct 7</span>
                                <span>Oct 8</span>
                                <span>Oct 9</span>
                                <span>Oct 10</span>
                                <span>Oct 11</span>
                                <span>Oct 12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Traffic Channels -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Last year comparison</h6>
                    </div>
                    <div class="card-body">
                        <h6 class="font-weight-bold">Traffic Channels</h6>
                        <div class="mb-3">
                            <span>All</span>
                            <div class="progress mt-1" style="height: 10px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"></div>
                            </div>
                        </div>
                        <div>
                            <span>Direct</span>
                            <div class="progress mt-1" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Report Section -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Report</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <p class="mb-4"><strong>AVC:</strong> TIME</p>
                            <h4 class="mb-4">2:37</h4>
                            <button class="btn btn-primary">
                                <i class="fas fa-file-alt fa-sm text-white-50"></i> Generate Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Calendar Section -->
    <div class="calendar-container">
        <header>
            <h1>Calendar</h1>
        </header>
        <main>
            <div class="calendar">
                <div class="calendar-header">
                    <button class="add-schedule">+ Add Schedule</button>
                    <span style="flex:1"></span>
                    <button class="month-view">Month View ▼</button>
                    <button class="today-btn">Today</button>
                </div>
                <div class="calendar-title-row">
                    <button id="prevMonth">←</button>
                    <h2 id="currentMonth">June 2025</h2>
                    <button id="nextMonth">→</button>
                </div>
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days">
                    <!-- Row 1 -->
                    <div class="day"><span class="date">1</span><span class="event green" style="position:absolute;top:30px;left:0;width:calc(100vw/7 - 40px);min-width:120px;">Boot Camp</span></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day today"><span class="date">6</span>
                        <span class="event green">Conference</span>
                        <span class="event small">● 11 AM Repc<br>+3 more</span>
                    </div>
                    <div class="day"><span class="event small">● 10 AM Meet</span><span class="date">7</span></div>
                    <!-- Row 2 -->
                    <div class="day"><span class="date">8</span></div>
                    <div class="day"><span class="date">9</span></div>
                    <div class="day"><span class="date">10</span></div>
                    <div class="day"><span class="date">11</span><span class="event blue">Crain's New Y</span></div>
                    <div class="day"><span class="date">12</span></div>
                    <div class="day"><span class="date">13</span></div>
                    <div class="day"><span class="event small">● 10 AM Cont</span><span class="date">14</span></div>
                    <!-- Row 3 -->
                    <div class="day"><span class="date">15</span></div>
                    <div class="day"><span class="date">16</span><span class="event orange" style="position:absolute;top:30px;left:0;width:calc(100vw/3 - 40px);min-width:250px;">ICT Expo 2025 - Product Release</span></div>
                    <div class="day"><span class="date">17</span></div>
                    <div class="day"><span class="date">18</span></div>
                    <div class="day"><span class="date">19</span></div>
                    <div class="day"><span class="date">20</span></div>
                    <div class="day"><span class="date">21</span></div>
                    <!-- Row 4 -->
                    <div class="day"><span class="date">22</span></div>
                    <div class="day"><span class="date">23</span><span class="event green">Event With Ur</span></div>
                    <div class="day"><span class="date">24</span></div>
                    <div class="day"><span class="date">25</span></div>
                    <div class="day"><span class="date">26</span><span class="event red">Competition</span></div>
                    <div class="day"><span class="date">27</span></div>
                    <div class="day"><span class="date">28</span></div>
                    <!-- Row 5 -->
                    <div class="day"><span class="date">29</span></div>
                    <div class="day"><span class="date">30</span></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"><span class="event blue" style="position:absolute;bottom:8px;right:8px;">Birthday Part</span><span class="date">5</span></div>
                </div>
            </div>
        </main>
    </div>




    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple script to toggle sidebar on mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggler = document.createElement('button');
            sidebarToggler.className = 'btn btn-primary d-sm-none position-fixed';
            sidebarToggler.style.bottom = '20px';
            sidebarToggler.style.right = '20px';
            sidebarToggler.style.zIndex = '999';
            sidebarToggler.innerHTML = '<i class="fas fa-bars"></i>';
            document.body.appendChild(sidebarToggler);
            
            sidebarToggler.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('toggled');
            });
        });
    </script>
        <footer>
        <p>&copy; 2024 Shop Admin Panel. All rights reserved.</p>
    </footer>
</body>
</html>