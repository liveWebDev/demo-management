<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="{{ config('app.url') }}/css/bootstrap.css">
    {{--<link rel="stylesheet" href="/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="{{ config('app.url') }}/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/css/_all-skins.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ config('app.url') }}/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/css/jquery.dataTables.min.css">
    <link href="{{ config('app.url') }}/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ config('app.url') }}/js/plugins/toggle/css/bootstrap-toggle.min.css">
    <link href="{{ config('app.url') }}/js/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ config('app.url') }}/js/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/css/admin.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/vendor/chosen/chosen.min.css">
</head>

<body class="skin-blue sidebar-mini">
{{--<img src="/img/ajax-loader.gif" id="loading-indicator" style="display:none" />--}}
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <b>{{ config('app.name') }}</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ config('app.url') }}/img/163104-200-grey.png" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ config('app.url') }}/img/163104-200-grey.png" class="img-circle" alt="User Image">
                                    <p>
                                        {!! Auth::user()->name !!}
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/admin/logout') !!}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
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
    @include('admin.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © {{ date('Y') }} <a href="#">{{ config('app.name') }}</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/admin') !!}">Login</a></li>
                    {{--<li><a href="{!! url('/register') !!}">Register</a></li>--}}
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endif

<!-- jQuery 2.1.4 -->
<script src="{{ config('app.url') }}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ config('app.url') }}/js/moment.js"></script>
<script src="{{ config('app.url') }}/js/bootstrap.js" type="text/javascript"></script>
<script src="{{ config('app.url') }}/js/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="{{ config('app.url') }}/js/plugins/icheck/js/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{ config('app.url') }}/js/app.min.js"></script>
<script src="{{ config('app.url') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ config('app.url') }}/js/dataTables.bootstrap.min.js"></script>
<script src="{{ config('app.url') }}/js/toastr.min.js"></script>
<script src="{{ config('app.url') }}/js/plugins/sweetalert/js/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ config('app.url') }}/js/plugins/toggle/js/bootstrap-toggle.min.js"></script>
<script src="{{ config('app.url') }}/js/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{ config('app.url') }}/vendor/chosen/chosen.jquery.min.js"></script>
<script src="https://use.fontawesome.com/411f524992.js"></script>
<script type="text/javascript">
    var appToken = "{!! csrf_token() !!}";
</script>
@stack('scripts')
<script type="text/javascript" src="{{ config('app.url') }}/js/admin.js"></script>
@yield("js")
@yield("footer")
</body>
</html>