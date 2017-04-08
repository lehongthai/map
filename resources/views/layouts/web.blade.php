<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{!! url('public/shopping-cart.png') !!}" type="image/png" sizes="16x16">
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