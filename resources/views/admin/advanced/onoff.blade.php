@extends('layouts.admin')
@section('title', $title)

@section('content')
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="form-group">
                                    <select class="form-control show-tick" id="user_id" name="user_id">
                                        <option>-- Chọn Nhân Viên --</option>
                                        @foreach($listUser as $user)
                                        <option value="{!! $user->id !!}" 
                                        @if(old('user_id') == $user->id || $user_id == $user->id) selected @endif>
                                        -- {!! $user->name !!} --
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="has-error">{!! $errors->first('user_id') !!}</span>
                                </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="start" id="input" class="form-control" value="{!! old('start', $start) !!}" placeholder="Start" title="Start">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="end" id="input" class="form-control" value="{!! old('end', $end) !!}"  placeholder="End" title="End">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Xem</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Tên Nhân Viên</th>
                                        <th>Ngày</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>Tên Nhân Viên</th>
                                        <th>Ngày</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @if($listStatus != NULL)
                                    @foreach($listStatus as $status)
                                    <tr>
                                        <td>{!! $status->name !!}</td>
                                        <td>{!! Carbon\Carbon::parse($status->date)->format('d-m-Y') !!}</td>
                                        <td>{!! getStatus($status->status) !!}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript')
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection