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
                            <a href="{!! url('quan-ly-nhan-vien/them-moi') !!}" class="btn btn-success header-dropdown m-r--5">Tạo mới</a>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Địa chỉ email</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ảnh</th>
                                        <th>Quyền</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Địa chỉ email</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ảnh</th>
                                        <th>Quyền</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @if($listUser != NULL)
                                    @foreach($listUser as $user)
                                    <tr>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>{!! $user->phone !!}</td>
                                        <td>{!! $user->address !!}</td>
                                        <td>{!! $user->image !!}</td>
                                        <td>
                                        @if($user->level == 1)
                                            {{"Admin"}}
                                        @else
                                            {{"Nhân viên"}}
                                        @endif
                                        </td>
                                        <td>{!! Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:m:s') !!}</td>
                                        <td>
                                            <div class="demo-google-material-icon">
                                                <a onclick="return confirm_delete('Bạn chắc chắn xóa !')" href="{!! url('quan-ly-nhan-vien/xoa/' . $user->id) !!}">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                                <a href="{!! url('quan-ly-nhan-vien/cap-nhat/' . $user->id) !!}" class="pull-right">
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