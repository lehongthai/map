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
                            <form method="post" action="{!! url('quan-ly-don-hang/cap-nhat') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" value="{!! $infoOrder->id !!}">
                            <input type="hidden" name="user_id" value="{!! $infoUser->id !!}">
                                <label for="fullname">Tên</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fullname" class="form-control" placeholder="Nhập họ tên" name="name" value="{!! old('name', $infoUser->name) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('name') !!}</span>
                                </div>
                                <label for="email">Địa chỉ email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" id="email" class="form-control" placeholder="Nhập địa chỉ email" name="email" value="{!! old('email', $infoUser->email) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('email') !!}</span>
                                </div>
                                <label for="phone">Số điện thoại</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="phone" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="{!! old('phone', $infoUser->phone) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('phone') !!}</span>
                                </div>
                                <label for="address">Địa chỉ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{!! old('address', $infoUser->address) !!}">
                                    </div>
                                </div>
                                <label for="product_code">Sản phẩm</label>
                                <div class="form-group">
                                   <!-- Multi Select -->
                                   <?php $products = explode(',', $infoOrder->product); ?>
                            <select id="optgroup" class="ms" multiple="multiple" name="product[]">
                            @foreach($listProduct as $product)
                                <option value="{!! $product->id !!}" 
                                @if(old('product') != NULL)
                                    @if(in_array($product->id, old('product')))
                                        selected
                                    @endif
                                @elseif(in_array($product->id, $products))
                                    selected
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
                                        <input type="text" id="note" class="form-control" placeholder="Nhập ghi chú" name="note" value="{!! old('note', $infoOrder->note) !!}">
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