<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="shortcut icon" rel="icon" href="{{asset('/assets/front/images/icon.png')}}" type="image/gif" />
    <title>  @yield('page_title') | Shray Trading | Best Ecommerce Trademark</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{asset('/assets/admin/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset('/assets/admin/css/main.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- PAGE LEVEL STYLES-->
    @yield('styles')
    <script src="{{asset('/assets/admin/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">

<header class="header">
    <div class="page-brand">
        <a class="link" href="/">
            <span class="brand">Shray
                <span class="brand-tip">Trading</span>
            </span>
            <span class="brand-mini">ST</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
             
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            
             
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="{{asset('/assets/admin/images/admin-avatar.png')}}" />
                    <span></span><i class="fa fa-angle-down m-l-5"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    {{--
                    <a class="dropdown-item" href="profile.html">
                        <i class="fa fa-user"></i>Profile
                    </a>
                    <a class="dropdown-item" href="profile.html">
                        <i class="fa fa-cog"></i>Settings
                    </a>
                    <a class="dropdown-item" href="https://webhousenepal.com/">
                        <i class="fa fa-support"></i>Support
                    </a>
                    --}}
                    <li class="dropdown-divider"></li>
                    @if(auth()->user())
                    <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a class="dropdown-item" href="{{ route('client.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>