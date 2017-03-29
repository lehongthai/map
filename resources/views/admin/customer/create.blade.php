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
                            <a href="{!! url('quan-ly-khach-hang/danh-sach') !!}" class="btn btn-success header-dropdown m-r--5">Back</a>
                        </div>
                        <div class="body">
                            <form method="post" action="{!! url('quan-ly-khach-hang/them-moi') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="fullname">Tên</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fullname" class="form-control" placeholder="Nhập họ tên" name="fullname" value="{!! old('fullname') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('fullname') !!}</span>
                                </div>
                                <label for="email">Địa chỉ email</label>
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
                                </div>
                                <label for="address">Địa chỉ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{!! old('address') !!}">
                                    </div>
                                </div>
                                <label for="product_code">Sản phẩm</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="product_code" name="product_code">
                                        <option>-- Chọn sản phẩm --</option>
                                        @foreach($listProduct as $product)
                                        <option value="{!! $product->code !!}" 
                                        @if(old('product_code') == $product->code) selected @endif>
                                        -- {!! $product->name !!} --
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="has-error">{!! $errors->first('product_code') !!}</span>
                                </div>
                                <label for="note">Ghi chú</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="note" class="form-control" placeholder="Nhập ghi chú" name="note" value="{!! old('note') !!}">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript-admin')
<script src="{{ asset('public/minovate/plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('public/minovate/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@endsection

@section('javascript')
 <script src="{{ asset('public/minovate/js/pages/forms/basic-form-elements.js') }}"></script>
@endsection