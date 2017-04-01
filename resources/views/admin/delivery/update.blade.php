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
                            <a href="{!! url('quan-ly-giao-hang/danh-sach') !!}" class="btn btn-success header-dropdown m-r--5">Back</a>
                        </div>
                        <div class="body">
                            <form method="post" action="{!! url('quan-ly-giao-hang/cap-nhat') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" value="{!! $infoDelivery['id'] !!}">
                                <label for="email_address">Nhân viên</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="email_address" name="user_id">
                                        <option>-- Chọn Nhân Viên --</option>
                                        @foreach($listUser as $user)
                                        <option value="{!! $user->id !!}" 
                                        @if(old('user_id') == $user->id || $infoDelivery['user_id'] == $user->id) selected @endif>
                                        -- {!! $user->name !!} --
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="has-error">{!! $errors->first('user_id') !!}</span>
                                </div>
                                
                                <label for="customer_id">Khách hàng</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="customer_id" name="customer_id">
                                        <option>-- Chọn Khách hàng --</option>
                                        @foreach($listCustomer as $customer)
                                        <option value="{!! $customer->id !!}" 
                                        @if(old('customer_id') == $customer->id || $infoDelivery['customer_id'] == $customer->id) selected @endif>
                                        -- {!! $customer->fullname !!} --
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="has-error">{!! $errors->first('customer_id') !!}</span>
                                </div>
                            
                                <label for="email_address">Ghi chú</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Nhập ghi chú" name="note" value="{!! old('note', $infoDelivery['note']) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('note') !!}</span>
                                </div>
                                <label for="email_address">Status</label>
                                <div class="demo-checkbox">
                                <input type="checkbox" name="status" id="md_checkbox_21" class="filled-in chk-col-red" value="2" 
                                @if($infoDelivery['status'] == 2 || old('status') == 2)
                                checked 
                                @endif
                                />
                                <label for="md_checkbox_21"></label>
                            </div>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cập nhật</button>
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