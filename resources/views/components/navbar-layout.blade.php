@include('layouts.app')

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <a href="/">
                <img src="{{ asset('assets/images/saas.png') }}" alt="" class="logo">
            </a>
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('forum.index') }}" class="text-nowrap logo-img">
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class='bx bx-x fs-6'></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        @auth
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('dashboard.index') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bxs-dashboard bx-md'></i>
                                    </span>
                                    <span class="hide-menu s fs-3 fw-bold ">Dashboard</span>
                                </a>
                            </li>
                        @endauth

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon s fs-3"></i>
                            <span class="hide-menu fw-normal fs-3 ">FEATURES</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('forum.index') }}" aria-expanded="false">
                                <span>
                                    <i class='bx bx-book-content bx-md'></i> </span>
                                <span class="hide-menu s fs-3 fw-bold ">Forums</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            @auth
                                <a class="sidebar-link" href="{{ route('question.index') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-question-mark bx-md'></i>
                                    </span>
                                    <span class="hide-menu s fs-3 fw-bold ">Ask</span>
                                </a>
                            @else
                                <a class="sidebar-link" href="{{ route('askLogin') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-question-mark bx-md'></i>
                                    </span>
                                    <span class="hide-menu s fs-3 fw-bold ">Ask</span>
                                </a>
                                <!-- Set a session flash message -->
                                @php
                                    session()->flash(
                                        'login_required_message',
                                        'You must be logged in to ask any question.',
                                    );
                                @endphp
                            @endauth
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon s fs-3"></i>
                            <span class="hide-menu fw-bold fs-3">Community</span>
                        </li>
                        @auth
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('community.index') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bxs-bookmarks bx-md'></i>
                                    </span>
                                    <span class="hide-menu s fs-3 fw-bold ">My Community</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('community.create') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-building-house bx-md'></i>
                                    </span>
                                    <span class="hide-menu fw-bold s fs-3 ">Create Community</span>
                                </a>
                            </li>
                        @endauth
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('availableCommunity.index') }}"
                                aria-expanded="false">
                                <span>
                                    <i class='bx bx-chat bx-md'></i>
                                </span>
                                <span class="hide-menu s fs-3 fw-bold ">Available Community</span>
                            </a>
                        </li>
                        @auth
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('joinedCommunity.index') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-news bx-md'></i>
                                    </span>
                                    <span class="hide-menu s fs-3 fw-bold ">Joined Community</span>
                                </a>
                            </li>
                        @endauth

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon s fs-3"></i>
                            <span class="hide-menu fw-bold fs-3">AUTH</span>
                        </li>

                        @if (Auth::check())
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-log-out bx-md'></i> </span>
                                    <span class="hide-menu s fs-3 fw-bold">Logout</span>
                                </a>
                            </li>
                        @else
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                                    <span>
                                        <i class='bx bx-log-in bx-md'></i> </span>
                                    <span class="hide-menu s fs-3 fw-bold">Login</span>
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
                            {{-- <a href="/" target="_blank" class="btn btn-primary">
                                <i class='bx bx-user-plus'></i>
                                Invite</a> --}}
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
                <div class=" w-100 h-100 position-relative">
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
