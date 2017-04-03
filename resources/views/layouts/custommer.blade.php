<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <!-- vendor css files -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('public/minovate/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('public/minovate/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('public/minovate/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('public/minovate/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/minovate/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/minovate/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/minovate/plugins/waitme/waitMe.css') }}" rel="stylesheet" />
    <!-- Multi Select Css -->
    <link href="{{ asset('public/minovate/plugins/multi-select/css/multi-select.css') }}" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('public/minovate/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('public/minovate/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('public/minovate/css/themes/all-themes.css') }}" rel="stylesheet" />

        <!--/ modernizr -->

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                ]) !!};
            </script>
        </head>
        <body>
           <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar" style="background-color: #f1c40f">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{!! url('trang-quan-tri/dashboard') !!}">Admin - Hệ thống quản lý giao hàng</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                
                    <li class="active">
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Khách hàng</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{!! url('thong-tin-khach-hang/don-hang') !!}">Đơn hàng</a>
                            </li>
                            <li>
                                <a href="{!! url('thong-tin-khach-hang/thong-tin') !!}">Thông tin</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">Admin - LeThai Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            @include('admin.message')

            @yield('content')
        </div>
    </section>

     <!-- Jquery Core Js -->
    <script src="{{ asset('public/minovate/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap Core Js -->
    <script src="{{ asset('public/minovate/plugins/bootstrap/js/bootstrap.js') }}"></script>
    

    @yield('javascript')


    <!-- Demo Js -->
    <script src="{{ asset('public/minovate/js/demo.js') }}"></script>
    </body>
    </html>
