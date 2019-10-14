@if(Session::has('success'))
	<div class="alert alert-success" style="margin-top: 10px">
		{!!Session::get('success')!!}
	</div>
@endif

@if(Session::has('error'))
	<div class="alert alert-danger" style="margin-top: 10px">
		{!!Session::get('error')!!}
	</div>
@endif