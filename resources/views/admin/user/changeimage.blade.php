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
                        	
                            <form method="post" action="{!! url('trang-quan-tri/doi-anh') !!}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                <label for="newpassword">Ảnh đại diện</label>
                                <div class="form-group">
                                    <p><img width="400px" src="{!! url('public/upload/profile/'.Auth::user()->image) !!}" alt=""></p>
                                    <input type="file" name="Hinh" value=""  class="form-control" >
                                </div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Đổi ảnh</button>
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