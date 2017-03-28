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
                            <a href="{!! url('quan-ly-giao-hang/them-moi') !!}" class="btn btn-success header-dropdown m-r--5">Create</a>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Address_delivery</th>
                                        <th>Phone_receiver</th>
                                        <th>Name_receiver</th>
                                        <th>Status</th>
                                        <th>Create</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Address_delivery</th>
                                        <th>Phone_receiver</th>
                                        <th>Name_receiver</th>
                                        <th>Status</th>
                                        <th>Create</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @if($listDelivery != NULL)
                                    @foreach($listDelivery as $delivery)
                                    <tr>
                                        <td>{!! $delivery->uName !!}</td>
                                        <td>{!! $delivery->cName !!}</td>
                                        <td>{!! $delivery->pName !!}</td>
                                        <td>{!! $delivery->address_delivery !!}</td>
                                        <td>{!! $delivery->phone_receiver !!}</td>
                                        <td>{!! $delivery->name_receiver !!}</td>
                                        <td>
                                            @if($delivery->status == 1)
                                            Đã giao
                                            @elseif($delivery->status == 2)
                                            Chưa giao
                                            @else
                                            Đang giao
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
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection