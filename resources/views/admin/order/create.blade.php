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
                            <a href="{!! url('quan-ly-don-hang/danh-sach') !!}" class="btn btn-success header-dropdown m-r--5">Back</a>
                        </div>
                        <div class="body">
                            <form method="post" action="{!! url('quan-ly-don-hang/them-moi') !!}">
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
                                <label for="fullname">Tên Khách Hàng</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fullname" class="form-control" placeholder="Nhập họ tên" name="name" value="{!! old('name') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('name') !!}</span>
                                </div>
                                <label for="email">Email Khách Hàng</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" id="email" class="form-control" placeholder="Nhập địa chỉ email" name="email" value="{!! old('email') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('email') !!}</span>
                                </div>
                                <label for="phone">Số điện thoại</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="phone" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="{!! old('phone') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('phone') !!}</span>
                                </div>
                                <label for="address">Địa chỉ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{!! old('address') !!}">
                                    </div>
                                </div>
                                <label for="receiver_name">Tên Người Nhận</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="receiver_name" class="form-control" placeholder="Nhập họ tên" name="receiver_name" value="{!! old('receiver_name') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('receiver_name') !!}</span>
                                </div>
                                <label for="receiver_phone">Số Điện Thoại Nhận</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="receiver_phone" class="form-control" placeholder="Nhập số điện thoại" name="receiver_phone" value="{!! old('receiver_phone') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('receiver_phone') !!}</span>
                                </div>
                                <label for="receiver_address">Địa Chỉ Nhận</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="receiver_address" class="form-control" placeholder="Nhập địa chỉ" name="receiver_address" value="{!! old('receiver_address') !!}">
                                    </div>
                                </div>
                                <label for="product_code">Sản phẩm</label>
                                <div class="form-group">
                                   <!-- Multi Select -->
                            <select id="optgroup" class="ms" multiple="multiple" name="product[]">
                            @foreach($listProduct as $product)
                                <option value="{!! $product->id !!}" 
                                @if(old('product') != NULL)
                                    @if(in_array($product->id, old('product')))
                                        selected
                                    @endif
                                @endif 
                                 >{!! $product->name !!}</option>
                            @endforeach
                            </select>
                             <span class="has-error">{!! $errors->first('product') !!}</span>
                            <!-- #END# Multi Select -->
                                </div>
                                <label for="note">Ghi chú</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="note" class="form-control" placeholder="Nhập ghi chú" name="note" value="{!! old('note') !!}">
                                    </div>
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
    <script src="{{ asset('public/minovate/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('public/minovate/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/dropzone/dropzone.js') }}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/nouislider/nouislider.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/node-waves/waves.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('public/minovate/js/admin.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/forms/advanced-form-elements.js') }}"></script>
@endsection