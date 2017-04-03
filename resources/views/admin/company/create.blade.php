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
                            <a href="{!! url('quan-ly-cong-ty/danh-sach') !!}" class="btn btn-success header-dropdown m-r--5">Back</a>
                        </div>
                        <div class="body">
                            <form method="post" action="{!! url('quan-ly-cong-ty/them-moi') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="name">Tên công ty</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" placeholder="Nhập tên công ty" name="name" value="{!! old('name') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('name') !!}</span>
                                </div>
                                <label for="website">Địa chỉ website</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="website" class="form-control" placeholder="Nhập địa chỉ website" name="website" value="{!! old('website') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('website') !!}</span>
                                </div>
                                <label for="phone">Số điện thoại</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="phone" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="{!! old('phone') !!}">
                                    </div>
                                </div>
                                <label for="address">Địa chỉ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{!! old('address') !!}">
                                    </div>
                                </div>
                                <label for="lng">Kinh độ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="lng" class="form-control" placeholder="Nhập kinh độ" name="lng" value="{!! old('lng') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('lng') !!}</span>
                                </div>
                               <label for="lat">Vĩ độ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="lat" class="form-control" placeholder="Nhập vĩ độ" name="lat" value="{!! old('lat') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('lat') !!}</span>
                                </div>
                                <br>
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