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
                            <table class="table table-bordered">

                                @if($listOrder != NULL)
                                    @foreach($listOrder as $order)
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <td>{!! $order->code !!}</td>
                                    </tr>
                                    <tr>
                                    	<th>Khách hàng</th>
                                    	<td>{!! $order->namecustomer !!}</td>
                                    </tr>
                                    <tr>
                                    	<th>Địa chỉ email</th>
                                    	<td>{!! $order->email !!}</td>
                                    </tr> 
                                    <tr>
                                    	<th>Tên người nhận</th>
                                    	<td>{!! $order->receiver_name !!}</td>
                                    </tr>
                                    <tr>
                                    	<th>Số Điện Thoại người nhận</th>
                                    	<td>{!! $order->receiver_phone !!}</td>
                                    </tr>
                                    <tr>
                                    	<th>Địa chỉ giao hàng</th>
                                    	<td>{!! $order->receiver_address !!}</td>
                                    </tr>  
                                    <tr>
                                    	<th>Ghi chú</th>  
                                    	<td>{!! $order->note !!}</td>
                                    </tr>    
                                    <tr>
                                    	<th>Trạng Thái</th>
                                    	<td>@if($order->status == 0)
                                            {{"Chưa giao"}}
                                        @elseif($order->status == 1)
                                            {{"Đang giao"}}
                                        @else($order->status == 2)
                                            {{"Đã giao"}}
                                        @endif</td>
                                    </tr>                                     
                                    <tr>
                                    	<th>Nhân viên giao hàng</th>
                                    	<td>{!! $order->name !!}</td>
                                    </tr>    
                                    <tr>
                                    	<th>Ngày bốc hàng</th>
                                    	<td>{!! $order->time_get !!}</td>
                                    </tr>  
                                    <tr>
                                    	<th>Ngày hoàn tất</th>
                                    	<td>{!! $order->time_over !!}</td>
                                    </tr>    
                                    <tr>
                                    	<th>Hình ảnh chứng từ</th>
                                    	<td>{!! $order->image !!}</td>
                                    </tr>    

                                    @endforeach
                                @endif

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