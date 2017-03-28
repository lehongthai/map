@extends('layouts.web')
@section('title', $title)

@section('content')

<div class="row totalAgency">
  <div class="col-md-3"><img src="images/totalLocations.png" width="58" height="54"  alt=""/>
    <h3>{!! $total !!} Nhân Viên</h3>
  </div>
  <div class="col-md-9">
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
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
            'defaultLat': '10.955580',
            'defaultLng' : '106.849762',
            'mapSettings' : {
                zoom : 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDoubleClickZoom: false,
                scrollwheel: true,
                navigationControl: true,
                draggable: true
              },
           'dataType' : 'json',
           'dataLocation' : '{!! url('json-nhan-vien') !!}'
         });
    });
</script>
@endsection