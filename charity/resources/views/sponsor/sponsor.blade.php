<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('icon.png')}}">
    
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/_all-skins.min.css') }}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('admin.index') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="{{ asset('backend/img/logo.jpeg') }}" alt="" height="50px"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>ICSEO</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset(Auth::user()->image) }}" class="user-image" alt="User Image">
                                <span
                                    class="hidden-xs">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset(Auth::user()->image) }}" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->role->name }} <small> {{ Auth::user()->email }}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('sponsor.create', Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                      <form method="POST" action="{{ route('logout') }}">
                                            @csrf 
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          this.closest('form').submit();">Sign out</a>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">Sponsor View</li>
                    <li class="{{ Request::segment(1) == 'admin' ? 'active' : '' }}"><a
                            href="{{ route('sponsor.index') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="{{ Request::segment(1) == 'user' ? 'active' : '' }}"><a
                        href="{{ route('sponsor.create') }}"><i class="fa fa-user"></i><span>Change info</span></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i><span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('message')}}!</strong>
                </div>
            @endif
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="fazlullahmamond@github.io">MAMOND</a>.</strong> All
            rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->




    <script src="{{ asset('backend/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/parsley.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin.js') }}"></script>
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/js/app.min.js') }}"></script>
        
    @yield('script')

</body>

</html>
