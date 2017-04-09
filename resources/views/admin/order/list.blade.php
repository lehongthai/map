@extends('layouts.admin')
@section('title', $title)

@section('content')
        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {!! $title !!}
                            </h2>
                            
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Khách hàng</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Ghi chú</th>                                       
                                        <th>Trạng Thái</th>
                                        <th>Nhân viên giao hàng</th>
                                        <th>Ngày bốc hàng</th>
                                        <th>Ngày hoàn tất</th>
                                        <th>Hình ảnh chứng từ</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Khách hàng</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa chỉ giao hàng </th>
                                        <th>Ghi chú</th>
                                        <th>Trạng Thái</th>
                                        <th>Nhân viên giao hàng</th>
                                        <th>Ngày bốc hàng</th>
                                        <th>Ngày hoàn tất</th>
                                        <th>Hình ảnh chứng từ</th>                                    
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @if($listOrder != NULL)
                                    @foreach($listOrder as $order)
                                    <tr>
                                        <td>{!! $order->code !!}</td>
                                        <td>{!! $order->namecustomer !!}</td>
                                        <td>{!! $order->email !!}</td>
                                        <td>{!! $order->phone !!}</td>
                                        <td>{!! $order->address !!}</td>
                                        <td>{!! $order->note !!}</td>
                                        <td>@if($order->status == 0)
                                            {{"Chưa giao"}}
                                        @elseif($order->status == 1)
                                            {{"Đang giao"}}
                                        @else($order->status == 2)
                                            {{"Đã giao"}}
                                        @endif</td>
                                        <td>{!! $order->name !!}</td>
                                        <td>{!! $order->time_get !!}</td>
                                        <td>{!! $order->time_over !!}</td>
                                        <td>{!! $order->image !!}</td>
                                        <td>
                                            <div class="demo-google-material-icon">
                                                <a onclick="return confirm_delete('Bạn chắc chắn xóa !')" href="{!! url('quan-ly-don-hang/xoa/' . $order->id) !!}">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                                <a href="{!! url('quan-ly-don-hang/cap-nhat/' . $order->id) !!}" class="pull-right">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
                                                
                                            </div>
                                        </td>
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
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('public/minovate/js/admin.js') }}"></script>
@endsection