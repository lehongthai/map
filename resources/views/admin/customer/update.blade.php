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
                            <form method="post" action="{!! url('quan-ly-khach-hang/cap-nhat') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" value="{!! $infoCustomer['id'] !!}">
                                <label for="fullname">Full Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fullname" class="form-control" placeholder="Enter your full name" name="fullname" value="{!! old('fullname', $infoCustomer['fullname']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('fullname') !!}</span>
                                </div>
                                <label for="email">Email Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" id="email" class="form-control" placeholder="Enter your email address" name="email" value="{!! old('email', $infoCustomer['email']) !!}" readonly="">
                                    </div>
                                    <span class="has-error">{!! $errors->first('email') !!}</span>
                                </div>
                                <label for="phone">Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="phone" class="form-control" placeholder="Enter your phone number" name="phone" value="{!! old('phone', $infoCustomer['phone']) !!}">
                                    </div>
                                </div>
                                <label for="address">Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="address" class="form-control" placeholder="Enter your address" name="address" value="{!! old('address', $infoCustomer['address']) !!}">
                                    </div>
                                </div>
                                <label for="product_code">Product_code</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="product_code" class="form-control" placeholder="Enter your product_code" name="product_code" value="{!! old('product_code', $infoCustomer['product_code']) !!}" readonly="">
                                    </div>
                                </div>
                                <label for="note">Note</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="note" class="form-control" placeholder="Enter your note" name="note" value="{!! old('note', $infoCustomer['note']) !!}">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
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