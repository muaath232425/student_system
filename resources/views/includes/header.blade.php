@php
    $current_route = Route::currentRouteName(); // அல்லது path அடிப்படையில்
    // அல்லது use Request facade
@endphp

<header class="position-sticky top-0 z-3 shadow-lg">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo and Brand on Left -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="https://i.ibb.co/rGQVqJ9s/dynamic-peer-learning-environment-illustration-vector.jpg"
                    alt="Logo" width="50" class="img-fluid rounded-circle">
                <span class="fw-bold text-light ms-2">Student - Management</span>
            </a>

            <!-- Menu Toggle on Right -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>

    <!-- Sidebar (Left Side) -->
    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">📋 Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column gap-3 mt-2">
                <li class="nav-item">
                    <a class="btn btn-outline-light w-100 fw-semibold border-2 rounded-pill {{ request()->is('home') ? 'active' : '' }}"
                        href="{{ route('subjects.index') }}">📚 Subjects</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light w-100 fw-semibold border-2 rounded-pill {{ request()->is('order_history') ? 'active' : '' }}"
                        href="{{ route('teachers.index') }}"> 📝 Techers</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light w-100 fw-semibold border-2 rounded-pill {{ request()->is('add_found') ? 'active' : '' }}"
                        href="{{ route('students.index') }}">👤 Students</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light w-100 fw-semibold border-2 rounded-pill {{ request()->is('account') ? 'active' : '' }}"
                        href="{{ route('attendances.index') }}">📅 Attendance</a>
                </li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 fw-semibold border-2 rounded-pill"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </button>
                </form>

            </ul>
        </div>
    </div>
</header>

<style>
    .btn-outline-light:hover {
        background-color: #ffffff !important;
        color: #000 !important;
        transition: 0.3s ease-in-out;
    }

    .active {
        background-color: #ffffff !important;
        color: #000 !important;
        transition: 0.3s ease-in-out;
    }

    /* Always show menu icon */
    .navbar-toggler {
        display: block !important;
    }

    /* Hide menu icon on larger screens */
    .navbar-toggler,
    .navbar-toggler:focus,
    .navbar-toggler:active,
    .navbar-toggler:hover {
        background-color: transparent !important;
        box-shadow: none !important;
        border: none !important;
        outline: none !important;
    }

    .navbar-toggler-icon,
    .navbar-toggler-icon:hover {
        background-color: transparent !important;
        box-shadow: none !important;
        border: none !important;
        outline: none !important;
        filter: none !important;
    }

    .offcanvas-start {
        width: 300px !important;
        /* Adjust this width as per your requirement */
    }
</style>
