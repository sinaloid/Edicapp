@if ($message = Session::get('autorisé'))
<div class="alert alert-success alert-block bg-success text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('non-autorisé'))
<div class="alert alert-danger alert-block bg-danger text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('récupéré'))
<div class="alert alert-info alert-block bg-info text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif 

@if ($message = Session::get('enregistrer'))
<div class="alert alert-info alert-block bg-success text-white font-weight-bold">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

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