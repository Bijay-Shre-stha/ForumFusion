@include('layouts.app')
<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('forum.index') }}" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class='bx bx-x fs-6'></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        @auth

                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Home</span>
                                <box-icon name='user'></box-icon>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('dashboard.index') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bxs-dashboard'></i>
                                    </span>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                        @endauth

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">FEATURES</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('forum.index') }}" aria-expanded="false">
                                <span>
                                    <i class='bx bx-book-content'></i> </span>
                                <span class="hide-menu">Forums</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('question.index') }}" aria-expanded="false">
                                <span>
                                    <i class='bx bx-question-mark'></i> </span>
                                <span class="hide-menu">Ask</span>
                            </a>
                        </li>
                        @auth
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Organization</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('organization.index') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-building-house'></i>
                                    </span>
                                    <span class="hide-menu">My Community</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('organization.create') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-building-house'></i>
                                    </span>
                                    <span class="hide-menu">Create Community</span>
                                </a>
                            </li>
                        @endauth

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>

                        @if (Auth::check())
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-log-out'></i> </span>
                                    <span class="hide-menu">Logout</span>
                                </a>
                            </li>
                        @else
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-log-in'></i> </span>
                                    <span class="hide-menu">Login</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/sign_up" aria-expanded="false">
                                    <span>
                                        <i class="bx bx-user-plus"></i>
                                    </span>
                                    <span class="hide-menu">Register</span>
                                </a>
                            </li>
                        @endif


                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class='bx bx-menu'></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class='bx bxs-bell-ring'></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="/" target="_blank" class="btn btn-primary">
                                <i class='bx bx-user-plus'></i>
                                Invite</a>
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                        data-bs-toggle="dropdown" aria-expanded="false">

                                        <img src="{{ Auth::user()->avatar }}" alt="" width="35"
                                            height="35" class="rounded-circle">


                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                        aria-labelledby="drop2">
                                        <div class="message-body">
                                            <a href="javascript:void(0)"
                                                class="d-flex align-items-center gap-2 dropdown-item">
                                                <i class="bx bx-user fs-6"></i>
                                                <p class="mb-0 fs-3">My Profile</p>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="d-flex align-items-center gap-2 dropdown-item">
                                                <i class="bx bxs-user-account fs-6"></i>
                                                <p class="mb-0 fs-3">My Account</p>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="d-flex align-items-center gap-2 dropdown-item">
                                                <i class="bx bx-list-check fs-6"></i>
                                                <p class="mb-0 fs-3">My Task</p>
                                            </a>
                                            <a href="{{ route('logout') }}"
                                                class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                        </div>
                                    </div>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card w-100 h-100 position-relative">
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

