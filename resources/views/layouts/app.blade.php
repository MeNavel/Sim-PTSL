<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sim-PTSL') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Suggest Typehead -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Data Table -->
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
@auth
    <header class="header fixed-top d-flex align-items-center" id="header">

        <div class="d-flex align-items-center justify-content-between">
            <a class="logo d-flex align-items-center" href="{{ route('home') }}">
                <img src="https://tataruang.atrbpn.go.id/Content/frontend/image/apple-touch-icon-57x57.png"
                     alt="">
                <span class="d-none d-lg-block">Sim-PTSL</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown"
                       href="#">
                        <i class="bi bi-person-circle"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->getRoleNames()->first() }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                            <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
            </ul>
        </nav><!-- End Icons Navigation -->

    </header>

    <aside class="sidebar" id="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() != 'home') {{ 'collapsed' }} @endif"
                   href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @can('koordinator-index')
            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() != 'koordinator.index') {{ 'collapsed' }} @endif"
                   href="{{ route('koordinator.index') }}">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Koordinator</span>
                </a>
            </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() != 'unduh.index') {{ 'collapsed' }} @endif"
                   href="{{ route('unduh.index') }}">
                    <i class="bi bi-download"></i>
                    <span>Unduh Data</span>
                </a>
            </li>

            <li class="nav-heading">Desa</li>
            @can('kramatsukoharjo-index')
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() != 'kramatsukoharjo.index') {{ 'collapsed' }} @endif"
                       data-bs-target="#tables-nav" href="{{ route('kramatsukoharjo.index') }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Kramat Sukoharjo</span>
                    </a>
                </li>
            @endcan
            @can('semboro-index')
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() != 'semboro.index') {{ 'collapsed' }} @endif"
                       data-bs-target="#tables-nav" href="{{ route('semboro.index') }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Semboro</span>
                    </a>
                </li>
            @endcan
            @can('sidomulyo-index')
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() != 'sidomulyo.index') {{ 'collapsed' }} @endif"
                       data-bs-target="#tables-nav" href="{{ route('sidomulyo.index') }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Sidomulyo</span>
                    </a>
                </li>
            @endcan
            @can('sidorejo-index')
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() != 'sidorejo.index') {{ 'collapsed' }} @endif"
                       data-bs-target="#tables-nav" href="{{ route('sidorejo.index') }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Sidorejo</span>
                    </a>
                </li>
            @endcan
            @can('pondokjoyo-index')
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() != 'pondokjoyo.index') {{ 'collapsed' }} @endif"
                       data-bs-target="#tables-nav" href="{{ route('pondokjoyo.index') }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Pondok Joyo</span>
                    </a>
                </li>
            @endcan
            @can('mundurejo-index')
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() != 'mundurejo.index') {{ 'collapsed' }} @endif"
                       data-bs-target="#tables-nav" href="{{ route('mundurejo.index') }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Mundurejo</span>
                    </a>
                </li>
            @endcan
            @can('sumberagung-index')
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() != 'sumberagung.index') {{ 'collapsed' }} @endif"
                       data-bs-target="#tables-nav" href="{{ route('sumberagung.index') }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Sumberagung</span>
                    </a>
                </li>
            @endcan
            @can('sidomekar-index')
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() != 'sidomekar.index') {{ 'collapsed' }} @endif"
                       data-bs-target="#tables-nav" href="{{ route('sidomekar.index') }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Sidomekar</span>
                    </a>
                </li>
            @endcan

            @role('Admin')
            <li class="nav-heading">Admin Panel</li>

            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() != 'users.index') {{ 'collapsed' }} @endif"
                   data-bs-target="#tables-nav" href="{{ route('users.index') }}">
                    <i class="bi bi-people"></i><span>Kelola Akun</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() != 'roles.index') {{ 'collapsed' }} @endif"
                   data-bs-target="#tables-nav" href="{{ route('roles.index') }}">
                    <i class="bi bi-person-check"></i><span>Hak Akses</span>
                </a>
            </li>
            @endrole
        </ul>
    </aside>
@endauth

@auth
    <main class="main" id="main">
        @yield('content')
    </main>
@else
    <main>
        @yield('content')
    </main>
@endauth

<a class="back-to-top d-flex align-items-center justify-content-center" href="#"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
