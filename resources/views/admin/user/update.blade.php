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
                            <a href="{!! url('quan-ly-nhan-vien/danh-sach') !!}" class="btn btn-success header-dropdown m-r--5">Back</a>
                        </div>
                        <div class="body">
                            <form method="post" action="{!! url('quan-ly-nhan-vien/cap-nhat') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" value="{!! $infoUser['id'] !!}">
                                <label for="fullname">Tên</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fullname" class="form-control" placeholder="Nhập họ và tên" name="fullname" value="{!! old('fullname', $infoUser['name']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('fullname') !!}</span>
                                </div>
                                <label for="email_address">Địa chỉ email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Nhập địa chỉ email" name="email" value="{!! old('email', $infoUser['email']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('email') !!}</span>
                                </div>
                                <label for="phone_address">Số điện thoại</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="phone_address" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="{!! old('phone', $infoUser['phone']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('phone') !!}</span>
                                </div>
                                <label for="email_address">Địa chỉ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{!! old('address', $infoUser['address']) !!}">
                                    </div>
                                </div>
                                <label for="email_address">Ngày sinh</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Chọn ngày..." name="birthday" value="{!! old('birthday', $infoUser['birthday']) !!}">
                                        </div>
                                    </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cập nhật</button>
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