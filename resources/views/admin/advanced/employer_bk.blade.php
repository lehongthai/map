@extends('layouts.web')
@section('title', $title)

@section('content')

<div class="row totalAgency">
  <div class="col-md-3">
  <a class="navbar-brand" href="{!! url('trang-quan-tri/dashboard') !!}">Quản Trị</a>
  </div>
  <div class="col-md-9">
    <p><form action="" method="POST" class="form-inline" role="form">
    
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <label for="user_id">Chọn Nhân Viên</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="user_id" name="user_id">
                                        <option>-- Chọn Nhân Viên --</option>
                                        @foreach($listUser as $user)
                                        <option value="{!! $user->id !!}" 
                                        @if(old('user_id') == $user->id || $uid == $user->id) selected @endif>
                                        {!! $user->name !!}
                                        </option>
                                        @endforeach
                                    </select><br>
                                    <span class="has-error">{!! $errors->first('user_id') !!}</span>
                                </div>
                                <label for="product_id">Chọn Đơn Hàng</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" id="product_id" name="product_id">
                                        <option>-- Chọn Đơn Hàng --</option>
                                        @foreach($listProduct as $product)
                                        <option value="{!! $product->code !!}" 
                                        @if(old(' ') == $product->code || $pid == $product->code) selected @endif>
                                        {!! $product->code !!}
                                        </option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <span class="has-error">{!! $errors->first('product_id') !!}</span>
                                </div>
      <button type="submit" class="btn btn-primary">Xem</button>
    </form></p>
  </div>
</div>
<div class="row">
   <div class="bh-sl-container">
    <div id="bh-sl-map-container" class="bh-sl-map-container">
      <div class="hedTitle searchLocation">
         <form id="bh-sl-user-location" method="post" action="#">
          <div class="input-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="text" class="form-control" name="bh-sl-address" id="bh-sl-address" placeholder="Search for ...">
            <span class="input-group-btn">
            <button class="btn btn-default" id="bh-sl-submit" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </span> 
          </div>
        </form>
      </div>
      <div class="bh-sl-loc-list">
        <ul class="list">
        </ul>
      </div>
      <div id="bh-sl-map" class="bh-sl-map"></div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('public/web/Store-Locator/dist/assets/js/libs/handlebars.min.js') }}"></script> 
<script src="//maps.google.com/maps/api/js?key=AIzaSyCoYHFhB9SbbUGXJ9jzhmSMihCJOOoQFyY"></script>
<script src="{{ asset('public/web/Store-Locator/dist/assets/js/plugins/storeLocator/jquery.storelocator.js') }}"></script>
<script>
    $(function() {
        $('#bh-sl-map-container').storeLocator({
            'slideMap' : false,
            'defaultLoc': true,
            'defaultLat': '{!! $infoCompany->lat !!}',
            'defaultLng' : '{!! $infoCompany->lng !!}',
            'mapSettings' : {
                zoom : 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDoubleClickZoom: false,
                scrollwheel: true,
                navigationControl: true,
                draggable: true
              },
           'dataType' : 'json',
           @if($local == null)
           'dataLocation' : '{!! url('json-nhan-vien') !!}'
           @else
           'dataRaw' : '{!! $local !!}'
           @endif
         });
    });
</script>
@endsection