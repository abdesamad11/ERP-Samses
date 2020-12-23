<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{asset('dist-assets/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dist-assets/css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('dist-assets/css/plugins/toastr.css')}}" />
<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="logo">
                <img src="{{asset('dist-assets/images/logo.png')}}" alt="">
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="d-flex align-items-center">
                <!-- Mega menu -->
                <!-- / Mega menu -->
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div>
            </div>
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Grid menu Dropdown -->

                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
        <img src="{{asset('dist-assets/images/faces/1.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i>  {{ Auth::user()->name }}
                            </div>
                            <a class="dropdown-item">Profile</a>
                            <a class="dropdown-item">Activite</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >     {{ __('Logout') }}            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- =============== Left side ================-->
        @include('users.layouts.sidbar');
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">

                @yield('content')
                <!-- end of main-content -->
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
            <div class="app-footer">
                <div>
                    <p class="m-0">&copy; 2020 Dev et desgin EL FERCHAKHI</p>
                    <p class="m-0">All rights reserved</p>
                </div>
            </div>
            <!-- fotter end -->
        </div>
    </div><!-- ============ Search UI Start ============= -->
    <div class="search-ui">
        <div class="search-header">
            <img src="{{asset('dist-assets/images/logo.png')}}" alt="" class="logo">
            <button class="search-close btn btn-icon bg-transparent float-right mt-2">
                <i class="i-Close-Window text-22 text-muted"></i>
            </button>
        </div>
        <input type="text" placeholder="Type here" class="search-input" autofocus>
        <div class="search-title">
            <span class="text-muted">Rechercher </span>
        </div>

        <!-- PAGINATION CONTROL -->

    </div>
    <!-- ============ Search UI End ============= -->


    <script src="{{asset('dist-assets/js/plugins/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/script.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/sidebar.large.script.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/dashboard.v2.script.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/toastr.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/toastr.script.min.js') }}"></script>
    @include('sweetalert::alert')
</body>



</html>
