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
             <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Danh Sách Giao Hàng
                            </h2>
                        
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Nhân viên</th>                           
                                        <th>SDT nhân viên</th>
                                        <th>Khách hàng</th>
                                        <th>SDT khách</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nhân viên</th>                           
                                        <th>SDT nhân viên</th>
                                        <th>Khách hàng</th>
                                        <th>SDT khách</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @if($listDelivery != NULL)
                                    @foreach($listDelivery as $delivery)
                                    <tr>
                                        <td>{!! $delivery->name !!}</td>
                                        <td>{!! $delivery->phone !!}</td>
                                        <td>{!! $delivery->oName !!}</td>
                                        <td>{!! $delivery->oPhone !!}</td>              
                                        <td>{!! $delivery->address !!}</td>
                                        <td>
                                            @if($delivery->status == 0)
                                            Chưa giao
                                            @elseif($delivery->status == 1)
                                            Đang giao
                                            @else
                                            Đã giao
                                            @endif
                                        </td>
                                        <td>{!! Carbon\Carbon::parse($delivery->created_at)->format('d-m-Y H:m:s') !!}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/tables/jquery-datatable.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <script src="{{ asset('public/minovate/js/admin.js') }}"></script>

<script src="{{ asset('public/minovate/js/pages/index.js') }}"></script>
@endsection