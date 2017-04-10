<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="{!! url('public/shopping-cart.png') !!}" type="image/png" sizes="16x16">
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
    <nav class="navbar" style="background-color: #8BC34A">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{!! url('trang-quan-tri/dashboard') !!}">Admin - Hệ thống quản lý giao hàng</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        
                        <ul class="dropdown-menu" role="menu">
                            <li>

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li>
                                <a href="{!! url('trang-quan-tri/doi-mat-khau') !!}">             
                                    Đổi mật khẩu
                                </a>
                            </li>
                            <li>
                                <a href="{!! url('trang-quan-tri/doi-anh') !!}">             
                                    Đổi ảnh đại diện
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
    @if(Auth::user()->level == 1 || Auth::user()->level == 2)
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">QUẢN TRỊ</li>
                    <li class="active">
                        <a href="{!! url('trang-quan-tri/dashboard') !!}">
                            <i class="material-icons">home</i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Nhân viên</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{!! url('quan-ly-nhan-vien/danh-sach') !!}">Danh sách nhân viên</a>
                            </li>
                            <li>
                                <a href="{!! url('quan-ly-nhan-vien/them-moi') !!}">Thêm nhân viên</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Sản phẩm</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{!! url('quan-ly-san-pham/danh-sach') !!}">Danh sách sản phẩm</a>
                            </li>
                            <li>
                                <a href="{!! url('quan-ly-san-pham/them-moi') !!}">Thêm sản phẩm</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Giao hàng</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{!! url('quan-ly-giao-hang/danh-sach') !!}">Danh sách giao hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Đơn hàng</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{!! url('quan-ly-don-hang/danh-sach') !!}">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="{!! url('quan-ly-don-hang/them-moi') !!}">Thêm đơn hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Khách hàng</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{!! url('quan-ly-khach-hang/danh-sach') !!}">Danh sách khách hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Công ty</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{!! url('quan-ly-cong-ty/danh-sach') !!}">Thông tin</a>
                            </li>
                           {{--  <li>
                                <a href="{!! url('quan-ly-cong-ty/them-moi') !!}">Thêm công ty</a>
                            </li> --}}
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Nâng Cao</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{!! url('quan-ly-nang-cao/nhan-vien') !!}">Nhân Viên</a>
                            </li>
                            <li>
                                <a href="{!! url('xem-vi-tri') !!}">Xem vị trí</a>
                            </li>
                            <li>
                                <a href="{!! url('quan-ly-nang-cao/on-off') !!}">Trạng thái On-Off</a>
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
        @endif
        @if(Auth::user()->level == 3)
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
        @endif
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
