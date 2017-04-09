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
                            
                        </div>
                        <div class="body">
                        	
                            <form method="post" action="{!! url('trang-quan-tri/doi-mat-khau') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            
                                <label for="password">Nhập mật khẩu cũ</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" class="form-control" placeholder="Nhập mật khẩu cũ" name="password" value="{!! old('password') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('password') !!}</span>
                                </div>
                                <label for="newpassword">Nhập mật khẩu mới</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="newpassword" class="form-control" placeholder="Nhập mật khẩu mới" name="newpassword" value="{!! old('newpassword') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('newpassword') !!}</span>
                                </div>
                                <label for="repassword">Nhập lại mật khẩu</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="repassword" class="form-control" placeholder="Nhập lại mật khẩu" name="repassword" value="{!! old('repassword') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('repassword') !!}</span>
                                </div>
                             
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Đổi mật khẩu</button>
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