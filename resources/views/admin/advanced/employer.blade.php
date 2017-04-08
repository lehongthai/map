@extends('layouts.admin')
@section('title', $title)

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/web/Store-Locator/dist/assets/css/storelocator.css') }}" />
                      <div class="bh-sl-container">
                      <div id="bh-sl-map-container" class="bh-sl-map-container">
                        <div class="bh-sl-loc-list">
                          <ul class="list">
                          </ul>
                        </div>
                        <div id="bh-sl-map" class="bh-sl-map"></div>
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
    <!-- Select Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('public/minovate/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/minovate/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/minovate/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('public/minovate/js/admin.js') }}"></script>
@endsection