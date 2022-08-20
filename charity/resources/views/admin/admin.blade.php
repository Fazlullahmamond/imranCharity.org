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
                                        <a href="{{ route('user.show', Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
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
                    <li class="header">Admin View</li>
                    <li class="{{ Request::segment(1) == 'admin' ? 'active' : '' }}"><a
                            href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="treeview {{ Request::segment(1) == 'user' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left "></i>
                            </span>
                        </a>
                        <ul class="treeview-menu menu-open">
                            <li>
                                <a href="{{ route('user.index') }}"><i class="fa fa-users"></i> User List</a>
                            </li>
                            <li>
                                <a href="{{ route('user.create') }}"><i class="fa fa-plus"></i>Add User </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview {{ Request::segment(1) == 'donator' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-money"></i> <span>Sponsors</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left "></i>
                            </span>
                        </a>
                        <ul class="treeview-menu menu-open">
                            <li>
                                <a href="{{ route('donator.index') }}"><i class="fa fa-users"></i> Sponsors List</a>
                            </li>
                            <li>
                                <a href="{{ route('donator.create') }}"><i class="fa fa-plus"></i>Add Sponsor </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview {{ Request::segment(1) == 'donator' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-money"></i> <span>Monthly Sponsors</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left "></i>
                            </span>
                        </a>
                        <ul class="treeview-menu menu-open">
                            <li>
                                <a href="{{ route('monthly_sponsors.index') }}"><i class="fa fa-users"></i>Monthly Sponsors List</a>
                            </li>
                            <li>
                                <a href="{{ route('monthly_sponsors.create') }}"><i class="fa fa-plus"></i>Add Monthly Sponsor </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview {{ Request::segment(1) == 'donateBox' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-suitcase"></i> <span>{{ 'Donation Boxs' }}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('donateBox.index') }}"><i class="fa fa-suitcase"></i> Donation
                                    Boxes</a></li>
                            <li>
                                <a href="{{ route('donateBox.create') }}"><i class="fa fa-plus"></i> Add
                                    Donate Box</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview {{ Request::segment(1) == 'needy' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Needy People</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('needy.index') }}"><i class="fa fa-users"></i> Needy People List</a>
                            </li>
                            <li>
                                <a href="{{ route('needy.create') }}"><i class="fa fa-plus"></i> Add Needy Person</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview {{ Request::segment(1) == 'donate' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-money"></i> <span>Donates</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left "></i>
                            </span>
                        </a>
                        <ul class="treeview-menu menu-open">
                            <li>
                                <a href="{{ route('donate.index') }}"><i class="fa fa-users"></i> Donates List</a>
                            </li>
                            <li>
                                <a href="{{ route('donate.create') }}"><i class="fa fa-plus"></i>Add Donates </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="treeview {{ Request::segment(1) == 'personType' || Request::segment(1) == 'donationType' || Request::segment(1) == 'donationSubType' || Request::segment(1) == 'relationship' || Request::segment(1) == 'causes' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-apple"></i> <span>Extra</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left "></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('personType.index') }}"><i class="fa fa-users"></i>Persons Types</a></li>
                            <li><a href="{{ route('donationType.index') }}"><i class="fa fa-circle-o"></i>Donation Types</a></li>
                            <li><a href="{{ route('relationship.index') }}"><i class="fa  fa-meh-o"></i>Relationships</a></li>
                            <li><a href="{{ route('causes.index') }}"><i class="fa fa-hashtag"></i>Appeals </a></li>
                        </ul>
                    </li>
                    <li class="treeview {{ Request::segment(1) == 'blog' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-bold"></i> <span>Blog</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu menu-open">
                            <li>
                                <a href="{{ route('blog.index') }}"><i class="fa fa-users"></i> Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('blog.create') }}"><i class="fa fa-plus"></i>Add Blog </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview {{ Request::segment(1) == 'contract' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-database"></i> <span>Contract</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu menu-open">
                            <li>
                                <a href="{{ route('contract.index') }}"><i class="fa fa-list"></i>Contract List</a>
                            </li>
                            <li>
                                <a href="{{ route('contract.create') }}"><i class="fa fa-plus"></i>Add Contract </a>
                            </li>
                        </ul>
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
            <strong>Copyright &copy; {{ date('Y') }} <a href="http://fazlullahmamond.github.io" target="__blank">MAMOND</a>.</strong> All
            rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('backend/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/parsley.min.js') }}"></script>
    <script src="{{ asset('backend/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin.js') }}"></script>
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/js/app.min.js') }}"></script>
    

        
    @yield('script')

</body>

</html>
