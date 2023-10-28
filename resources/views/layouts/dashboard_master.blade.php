<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('dashboard_assets') }}/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard_assets') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('dashboard_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dashboard_assets') }}/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dashboard_assets') }}/assets/js/config.js"></script>
    {{-- sweet alert cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- summernote --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">

                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">Fizy</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item {{ \Request::route()->getName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboards">Dashboards</div>
                        </a>
                    </li>

                    @if (auth()->user()->role != 'visitor')
                        <li class="menu-item {{ \Request::route()->getName() == 'role' ? 'active' : '' }}">
                            <a href="{{ route('role') }}" class="menu-link">
                                <i class="menu-icon bx bx-key"></i>
                                <div data-i18n="role">Manage Role</div>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role != 'visitor')
                        <li class="menu-item {{ \Request::route()->getName() == 'user' ? 'active' : '' }}">
                            <a href="{{ route('user') }}" class="menu-link">
                                <i class="menu-icon bx bx-user"></i>
                                <div data-i18n="user">Manage User</div>
                            </a>
                        </li>
                    @endif

                    <li class="menu-item {{ \Request::route()->getName() == 'category' ? 'active' : '' }}">
                        <a href="{{ route('category') }}" class="menu-link">
                            <i class="menu-icon bx bx-category"></i>
                            <div data-i18n="category">Category</div>
                        </a>
                    </li>
                    <li class="menu-item {{ \Request::route()->getName() == 'tag' ? 'active' : '' }}">
                        <a href="{{ route('tag') }}" class="menu-link">
                            <i class="menu-icon bx bx-tag"></i>
                            <div data-i18n="tag">Tag</div>
                        </a>
                    </li>


                    <li class="menu-item {{ \Request::route()->getName() == 'blog' ? 'active' : '' }}">
                        <a href="{{ route('blog') }}" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxl-blogger"></i>
                            <div data-i18n="blogs">Blogs</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ \Request::route()->getName() == 'blog' ? 'active' : '' }}">
                                <a href="{{ route('blog') }}" class="menu-link">
                                    <div data-i18n="CRM">Blogs</div>
                                    <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">5</div>
                                </a>
                            </li>
                            <li class="menu-item {{ \Request::route()->getName() == 'blog.add' ? 'active' : '' }}">
                                <a href="{{ route('blog.add') }}" class="menu-link">
                                    <div data-i18n="Analytics">Add Blog</div>
                                    <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"><i
                                            class='bx bx-plus'></i></div>
                                </a>
                            </li>
                            <li class="menu-item {{ \Request::route()->getName() == 'blog.trash' ? 'active' : '' }}">
                                <a href="{{ route('blog.trash') }}" class="menu-link">
                                    <div data-i18n="Analytics">Trash</div>
                                    <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"><i
                                            class='bx bx-trash'></i></div>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar ................................................................-->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2"
                                    placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">




                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="bx bx-bell bx-sm"></i>
                                    <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body mb-0 me-auto">Notification</h5>
                                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                                        </div>
                                    </li>
                                    <li class="dropdown-menu-footer border-top p-3">
                                        <button class="btn btn-primary text-uppercase w-100">view all
                                            notifications</button>
                                    </li>
                                </ul>
                            </li>
                            <!--/ Notification -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('uploads/image/profile') }}/{{ auth()->user()->image }}"
                                            alt class="w-px-40 h-40 rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('uploads/image/profile') }}/{{ auth()->user()->image }}"
                                                            alt class="w-px-40 h-40 rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ auth()->user()->name }}</span>
                                                    <small class="text-muted">{{ auth()->user()->role }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                                <span class="flex-grow-1 align-middle ms-1">Billing</span>
                                                <span
                                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf

                                                <i class="bx bx-power-off me-2"></i>
                                                <button type="submit" class="align-middle"
                                                    style="border: none; background:none; color:gray;">Logout</button>
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->






                <main class="py-4">
                    @yield('content')
                </main>






                <!-- Core JS -->
                <!-- build:js assets/vendor/js/core.js -->

                {{-- <script src="{{ asset('dashboard_assets') }}/assets/vendor/libs/jquery/jquery.js"></script> --}}
                <script src="{{ asset('dashboard_assets') }}/assets/vendor/libs/popper/popper.js"></script>
                <script src="{{ asset('dashboard_assets') }}/assets/vendor/js/bootstrap.js"></script>
                <script src="{{ asset('dashboard_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="{{ asset('dashboard_assets') }}/assets/vendor/js/menu.js"></script>

                <!-- endbuild -->

                <!-- Vendors JS -->
                <script src="{{ asset('dashboard_assets') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

                <!-- Main JS -->
                <script src="{{ asset('dashboard_assets') }}/assets/js/main.js"></script>

                <!-- Page JS -->
                <script src="{{ asset('dashboard_assets') }}/assets/js/dashboards-analytics.js"></script>

                <!-- Place this tag in your head or just before your close body tag. -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>

                {{-- summer note script  --}}
                <script>
                    $(document).ready(function() {
                        $('#summernote').summernote();
                    });
                </script>
                @yield('footer_script')
</body>

</html>
