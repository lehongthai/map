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
                                <label for="fullname">Full Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fullname" class="form-control" placeholder="Enter your full name" name="fullname" value="{!! old('fullname') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('fullname') !!}</span>
                                </div>
                                <label for="email_address">Email Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Enter your email address" name="email" value="{!! old('email') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('email') !!}</span>
                                </div>
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password">
                                    </div>
                                </div>
                                <label for="email_address">Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Enter your email address" name="address" value="{!! old('address') !!}">
                                    </div>
                                </div>
                                <label for="email_address">Birthday</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Please choose a date..." name="birthday" value="{!! old('birthday') !!}">
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