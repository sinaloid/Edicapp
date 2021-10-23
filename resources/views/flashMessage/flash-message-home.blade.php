@if ($message = Session::get('non-terminer'))
<div class="alert alert-info alert-block bg-danger text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('terminer'))
<div class="alert alert-info alert-block bg-success text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('publier'))
<div class="alert alert-info alert-block bg-success text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('non-publier'))
<div class="alert alert-info alert-block bg-danger text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('supprimer'))
<div class="alert alert-info alert-block bg-danger text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif
<script>
	setTimeout(function() {
    	$('#flash').fadeOut('fast');
	}, 5000);
</script>