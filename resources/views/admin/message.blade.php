@if(Session::has('flash_message'))
<div class="row clearfix">
	<div class="alert alert-{!! Session::get('level') !!}">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong>Thông báo!</strong> {!! Session::get('flash_message') !!}
	</div>
</div>
@endif


