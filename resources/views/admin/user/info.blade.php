@extends('layouts.admin')
@section('title', $title)

@section('content')
        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                    	
                                        <th>Tên</th>
                                       {{--  <th>Địa chỉ email</th> --}}
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Sản phẩm</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Ghi chú</th>
                                        <th>Ngày tạo</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    	
                                        <th>Tên</th>
                                        {{-- <th>Địa chỉ email</th> --}}
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Sản phẩm</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Ghi chú</th>
                                        <th>Ngày tạo</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                	@foreach($infoOrder as $info)
                                    <tr>
                                    	
                                        <td>{{ Auth::user()->name }}</td>
                                        {{-- <td>{{ Auth::user()->email }}</td> --}}
                                        <td>{{ Auth::user()->phone }}</td>
                                        <td>{{ Auth::user()->address }}</td>
                                        <td>{{ getProduct($info->product) }}</td>
                                        <td>{!! $info->code !!}</td>
                                        <td>@if($info->status == 0)
                                            {{"Chưa giao"}}
                                        @elseif($info->status == 1)
                                            {{"Đang giao"}}
                                        @else($info->status == 2)
                                            {{"Đã giao"}}
                                        @endif</td>
                                        <td>{{ $info->note }}</td>   
                                        <td>{!! Carbon\Carbon::parse($info->created_at)->format('d-m-Y H:m:s') !!}</td>                              
                                        
                                    </tr>
                                    @endforeach

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
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('public/minovate/js/admin.js') }}"></script>
@endsection