<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{!! $title !!}</title>
    <link rel="icon" href="{!! url('public/shopping-cart.png') !!}" type="image/png" sizes="16x16">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		 <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
	</head>
	<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{!! url('trang-quan-tri/dashboard') !!}">Quản Trị</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<form class="navbar-form navbar-left" action="{!! url('quan-ly-nang-cao/nhan-vien') !!}" method="post">
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
                                        @if(old('product_id') == $product->code || $pid == $product->code) selected @endif>
                                        {!! $product->code !!}
                                        </option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <span class="has-error">{!! $errors->first('product_id') !!}</span>
                                </div>
                                <label for="datepicker">Chọn Ngày</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="datepicker" class="form-control" placeholder="Enter your date" name="date" value="{!! old('date', $date) !!}">
                                    </div>
                                    <span class="has-error">{!! $errors->first('date') !!}</span>
                                </div>
					<button type="submit" class="btn btn-success">Xem</button>
				</form>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
		<div id="map"></div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		 <script>

      // This example creates a 2-pixel-wide red polyline showing the path of William
      // Kingsford Smith's first trans-Pacific flight between Oakland, CA, and
      // Brisbane, Australia.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 10.778386, lng: 106.696165},
          mapTypeId: 'terrain'
        });

        var flightPlanCoordinates = [
          {!! $listDistance !!}
        ];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoYHFhB9SbbUGXJ9jzhmSMihCJOOoQFyY&callback=initMap">
    </script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat : 'dd-mm-yy'
    });
  } );
  </script>
	</body>
</html>