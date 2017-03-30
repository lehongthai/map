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
                            <form method="post" action="{!! url('quan-ly-nang-cao/nhan-vien') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="user_id">Chọn Nhân Viên</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="user_id" name="user_id">
                                        <option>-- Chọn Nhân Viên --</option>
                                        @foreach($listUser as $user)
                                        <option value="{!! $user->id !!}" 
                                        @if(old('user_id') == $user->id) selected @endif>
                                        -- {!! $user->name !!} --
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="has-error">{!! $errors->first('user_id') !!}</span>
                                </div>
                                <label for="product_id">Product quanlity</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="product_id" name="product_id">
                                        <option>-- Chọn Sản Phẩm --</option>
                                        @foreach($listProduct as $product)
                                        <option value="{!! $product->id !!}" 
                                        @if(old('product_id') == $product->id) selected @endif>
                                        -- {!! $product->name !!} --
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="has-error">{!! $errors->first('product_id') !!}</span>
                                </div>
                                <label for="phone_receiver">Chọn khách hàng</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="phone_receiver" class="form-control" placeholder="Enter your phone receiver" name="date" value="{!! old('date') !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('date') !!}</span>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">View</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript-admin')
<script src="{{ asset('public/minovate/plugins/autosize/autosize.js') }}"></script>
<script src="{{ asset('public/minovate/plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('public/minovate/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@endsection

@section('javascript')
 <script src="{{ asset('public/minovate/js/pages/forms/basic-form-elements.js') }}"></script>
@endsection