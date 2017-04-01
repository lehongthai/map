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
                            <a href="{!! url('quan-ly-san-pham/them-moi') !!}" class="btn btn-success header-dropdown m-r--5">Tạo mới</a>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                         <th>Tên sản phẩm</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @if($listProduct != NULL)
                                    @foreach($listProduct as $product)
                                    <tr>
                                        <td>{!! $product->name !!}</td>
                                        <td>{!! $product->code !!}</td>
                                        <td>{!! $product->quanlity !!}</td>
                                        <td>{!! Carbon\Carbon::parse($product->created_at)->format('d-m-Y H:m:s') !!}</td>
                                        <td>
                                            <div class="demo-google-material-icon">
                                                <a onclick="return confirm_delete('Bạn chắc chắn xóa !')" href="{!! url('quan-ly-san-pham/xoa/' . $product->id) !!}">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                                <a href="{!! url('quan-ly-san-pham/cap-nhat/' . $product->id) !!}" class="pull-right">
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
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection