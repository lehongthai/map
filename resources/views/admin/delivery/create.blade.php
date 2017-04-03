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
                            <a href="{!! url('quan-ly-giao-hang/danh-sach') !!}" class="btn btn-success header-dropdown m-r--5">Back</a>
                        </div>
                        <div class="body">
                            <form method="post" action="{!! url('quan-ly-giao-hang/them-moi') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="user_id">Nhân viên</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="user_id" name="user_id">
                                        <option>-- Chọn Nhân Viên --</option>
                                        @foreach($listUser as $user)
                                        <option value="{!! $user->id !!}" 
                                        @if(old('user_id') == $user->id) selected @endif>
                                        {!! $user->name !!}
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="has-error">{!! $errors->first('user_id') !!}</span>
                                </div>
                
                                <label for="order_code"></label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="order_code" name="order_code">
                                        <option>-- Chọn Đơn Hàng --</option>
                                        @foreach($listOrder as $order)
                                        <option value="{!! $order->code !!}" 
                                        @if(old('order_code') == $order->code) selected @endif>
                                        {!! $order->name !!}
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="has-error">{!! $errors->first('order_code') !!}</span>
                                </div>
                            
                                <label for="note">Ghi chú</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="note" class="form-control" placeholder="Nhập ghi chú" name="note" value="{!! old('note') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('note') !!}</span>
                                </div>
                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tạo mới</button>
                            </form>
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
    <script src="{{ asset('public/minovate/plugins//jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('public/minovate/plugins/autosize/autosize.js') }}"></script>
<script src="{{ asset('public/minovate/plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('public/minovate/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
 
    <script src="{{ asset('public/minovate/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('public/minovate/js/admin.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/forms/basic-form-elements.js') }}"></script>
 <!-- Waves Effect Plugin Js -->

@endsection