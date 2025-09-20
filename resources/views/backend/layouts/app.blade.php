<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap & Toastr --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    @stack('styles')

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-wrapper {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #ffffff;
        }

        .sidebar .nav-link.active {
            background-color: #495057;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>

<body>
    @if (!request()->routeIs('login'))
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TKIT Baiturrahman</a>
            </div>
        </nav>

        <div class="admin-wrapper">
            <aside class="sidebar p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ url('/admin/dashboard') }}"
                            class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sections.index') }}"
                            class="nav-link {{ request()->routeIs('sections.*') ? 'active' : '' }}">
                            Section Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('heros.index') }}"
                            class="nav-link {{ request()->routeIs('heros.*') || request()->routeIs('hero.show') ? 'active' : '' }}">
                            Hero Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('navbar.index') }}"
                            class="nav-link {{ request()->routeIs('navbar.*') ? 'active' : '' }}">
                            Navbar Items
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('facilities.index') }}"
                            class="nav-link {{ request()->routeIs('facilities.*') ? 'active' : '' }}">
                            Facility Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about.index') }}"
                            class="nav-link {{ request()->routeIs('about.*') ? 'active' : '' }}">
                            About Section
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('call-to-action.index') }}"
                            class="nav-link {{ request()->routeIs('call-to-action.*') ? 'active' : '' }}">
                            Recruitment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.classes.index') }}"
                            class="nav-link {{ request()->routeIs('backend.admin.classes.*') ? 'active' : '' }}">
                            Classes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.appointments.index') }}"
                            class="nav-link {{ request()->routeIs('backend.admin.appointments.*') ? 'active' : '' }}">
                            Appointment Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('appointment-images.index') }}"
                            class="nav-link {{ request()->routeIs('appointment-images.*') ? 'active' : '' }}">
                            Appointment Image Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teams.index') }}"
                            class="nav-link {{ request()->routeIs('teams.*') ? 'active' : '' }}">
                            Team Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('testimonials.index') }}"
                            class="nav-link {{ request()->routeIs('testimonials.*') ? 'active' : '' }}">
                            Testimonials
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logo') }}"
                            class="nav-link {{ request()->routeIs('logo') ? 'active' : '' }}">
                            Logo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.news.index') }}"
                            class="nav-link {{ request()->routeIs('backend.admin.news.*') ? 'active' : '' }}">
                            News Management
                        </a>
                    </li>
                </ul>
            </aside>

            <main class="main-content">
                @yield('content')
            </main>
        </div>
    @else
        {{-- Tampilan khusus untuk halaman login --}}
        <div class="container mt-5">
            @yield('content')
        </div>
    @endif

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    @stack('scripts')
</body>

</html>
