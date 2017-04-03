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
                            <a href="{!! url('quan-ly-giao-hang/them-moi') !!}" class="btn btn-success header-dropdown m-r--5">Tạo mới</a>
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
                                        <th style="width: 6%">Hành động</th>
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
                                        <th style="width: 6%">Hành động</th>
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
                                        <td>
                                            <div class="demo-google-material-icon">
                                                <a onclick="return confirm_delete('Bạn chắc chắn xóa !')" href="{!! url('quan-ly-giao-hang/xoa/' . $delivery->id) !!}">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                                <a href="{!! url('quan-ly-giao-hang/cap-nhat/' . $delivery->id) !!}" class="pull-right">
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