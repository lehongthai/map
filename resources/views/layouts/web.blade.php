<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>@yield('title')</title>
<link rel="stylesheet" href="{{ asset('public/web/css/pickmeup.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/web/css/bootstrap-select.css') }}">
<link rel="stylesheet" href="{{ asset('public/web/css/font-awesome.min.css') }}">
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<link href="{{ asset('public/web/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/web/css/customize.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/web/Store-Locator/dist/assets/css/storelocator.css') }}" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

</head>
<body>
<div class="row topBar" id="topbar">
  <div class="col-lg-7 col-md-6 col-xs-12 col-sm-4 logo"><a href="lottery.html"><img src="images/logo.png" width="123" height="31"  alt=""/></a></div>
  <div class="col-lg-5 col-md-6 col-xs-12 col-sm-8">
    <div class="dateTime">Tuesday. Apr 1, 2016<br>
      08:45 PM</div>
    
    <div class="social pull-right"> 
    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> 
    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
    </div>
  </div>
</div>
<div class="row">
  <nav class="navbar navbar-inverse">
    <div class="container fullWidth">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="{!! url('vi-tri-nhan-vien') !!}"><span class="icon-agency"></span>Vị Trí</a></li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </nav>
</div>

@yield('content')

</div>
<div class="row footer"> <a href="#topbar" class="runtoTop"></a>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('public/web/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/web/js/jquery.pickmeup.js') }}"></script>
<script src="{{ asset('public/web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/web/js/bootstrap-select.js') }}"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('javascript')

</body>
</html>