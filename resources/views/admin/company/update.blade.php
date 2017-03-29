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
                            <form method="post" action="{!! url('quan-ly-cong-ty/cap-nhat') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" value="{!! $infoCompany['id'] !!}">
                                <label for="name">Tên công ty</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" placeholder="Nhập tên công ty" name="name" value="{!! old('name', $infoCompany['name']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('name') !!}</span>
                                </div>
                                <label for="website">Địa chỉ website</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="website" class="form-control" placeholder="Nhập địa chỉ website" name="website" value="{!! old('website', $infoCompany['website']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('website') !!}</span>
                                </div>
                                <label for="phone">Số điện thoại</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="phone" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="{!! old('phone', $infoCompany['phone']) !!}">
                                    </div>
                                </div>
                                <label for="address">Địa chỉ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control" placeholder="Nhập số địa chỉ" name="address" value="{!! old('address', $infoCompany['address']) !!}">
                                    </div>
                                </div>
                                <label for="lng">Kinh độ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="lng" class="form-control" placeholder="Nhập kinh độ" name="lng" value="{!! old('lng', $infoCompany['lng']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('lng') !!}</span>
                                </div>
                               <label for="lat">Vĩ độ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="lat" class="form-control" placeholder="Nhập vĩ độ" name="lat" value="{!! old('lat', $infoCompany['lat']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('lat') !!}</span>
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

@section('javascript-admin')
<script src="{{ asset('public/minovate/plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('public/minovate/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@endsection

@section('javascript')
 <script src="{{ asset('public/minovate/js/pages/forms/basic-form-elements.js') }}"></script>
@endsection