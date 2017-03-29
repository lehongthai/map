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
                            <form method="post" action="{!! url('quan-ly-nhan-vien/them-moi') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="fullname">Tên</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fullname" class="form-control" placeholder="Nhập họ và tên" name="fullname" value="{!! old('fullname') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('fullname') !!}</span>
                                </div>
                                <label for="email_address">Địa chỉ email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Nhập địa chỉ email" name="email" value="{!! old('email') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('email') !!}</span>
                                </div>
                                <label for="password">Mật khẩu</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                                    </div>
                                </div>
                                <label for="email_address">Địa chỉ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{!! old('address') !!}">
                                    </div>
                                </div>
                                <label for="email_address">Ngày sinh</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Chọn ngày..." name="birthday" value="{!! old('birthday') !!}">
                                        </div>
                                    </div>
                             
                              <!--   <label>Level</label>
                                <label class="radio-inline">
                                    <input name="level" value="0" type="radio" checked="">Nhân viên
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="1"  type="radio">Admin
                                </label> -->
                                
                            </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create</button>
                            </form>
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