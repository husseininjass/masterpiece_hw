{{-- <section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="{{ route('dashboard') }}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">My Store</span>
            </a>
        </li>
        <li>
            <a href="{{ route('view_Categories') }}">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Categories</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Message</span>
            </a>
        </li>
        <li>
            <a href="{{ route('view_users') }}">
                <i class='bx bxs-group' ></i>
                <span class="text">Users</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section> --}}
{{-- 2 --}}
{{-- <input type="checkbox" id="menu-toggle">
<div class="sidebar">
    <div class="side-header">
        <h3>M<span>odern</span></h3>
    </div>
    
    <div class="side-content">
        <div class="profile">
            <div class="profile-img bg-img" style="background-image: url()"></div>
            <h4>David Green</h4>
            <small>Art Director</small>
        </div>

        <div class="side-menu">
            <ul>
                <li>
                   <a href="{{ route('dashboard') }}" class="active">
                        <span class="las la-home"></span>
                        <small>Dashboard</small>
                    </a>
                </li>
                <li>
                   <a href="{{ route('view_users') }}">
                        <span class="las la-user-alt"></span>
                        <small>Users</small>
                    </a>
                </li>
                <li>
                   <a href="{{ route('view_Categories') }}">
                        <span class="las la-clipboard-list"></span>
                        <small>Categories</small>
                    </a>
                </li>
                <li>
                   <a href="{{ route('dashboard') }}">
                        <span class="las la-envelope"></span>
                        <small>Mailbox</small>
                    </a>
                </li>
                <li>
                   <a href="">
                        <span class="las la-shopping-cart"></span>
                        <small>Orders</small>
                    </a>
                </li>
                <li>
                   <a href="">
                        <span class="las la-tasks"></span>
                        <small>Tasks</small>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div> --}}

{{-- 3 --}}
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Usy</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('uploads/logo/logo_usy.png') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            
            <a href="{{ route('view_Categories') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Categories</a>
            <a href="{{ route('view_users') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Users</a>
            <a href="{{ route('view_Products') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Products</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Charts</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div>
        </div>
    </nav>
</div>