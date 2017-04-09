@extends('layouts.admin')
@section('title', $title)
@section('content')
        <div class="container-fluid">
            <div class="block-header">
                <h2>THỐNG KÊ</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <div class="demo-google-material-icon"> <i class="material-icons">local_shipping</i> <span class="icon-name">local_shipping</span></div>
                                </div>
                        </div>
                        <div class="content">
                            <div class="text">CHƯA GIAO</div>
                            <div class="number count-to" data-from="0" data-to="{!! $orderByStatus0 !!}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                             <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <div class="demo-google-material-icon"> <i class="material-icons">compare_arrows</i> <span class="icon-name">compare_arrows</span></div>
                                </div>
                        </div>
                        <div class="content">
                            <div class="text">ĐANG GIAO</div>
                            <div class="number count-to" data-from="0" data-to="{!! $orderByStatus1 !!}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">HOÀN TẤT</div>
                            <div class="number count-to" data-from="0" data-to="{!! $orderByStatus2 !!}" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">ONLINE</div>
                            <div class="number count-to" data-from="0" data-to="{!! $userOnline !!}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
        </div>
@endsection

@section('javascript')
    <!-- Select Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/node-waves/waves.js') }}"></script>

    
    <!-- Custom Js -->
        <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('public/minovate//plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <script src="{{ asset('public/minovate/js/admin.js') }}"></script>

<script src="{{ asset('public/minovate/js/pages/index.js') }}"></script>
@endsection