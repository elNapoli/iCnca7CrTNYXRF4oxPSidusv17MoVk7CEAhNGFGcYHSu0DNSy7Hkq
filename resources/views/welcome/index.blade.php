@extends('internet.app')

@section('portada')

<div class="row">
	<div class="col-lg-12">
		@include('welcome.partials.carousel')
	</div>
</div>
<div id="pix">
                    
</div>  

<div class="row">
	<div class="col-lg-4">

	@include('welcome.partials.noticias')
	


	</div>

	<div class="col-lg-7">
	
	@include('welcome.partials.foro')


	</div>

	<div class="col-lg-1">

	@include('welcome.partials.social')

	</div>

</div>
@endsection

@section('title')
Portada
@endsection


@section('scripts')
<script>
	
	$(document).on('ready',function(){

	$('.carousel').carousel();
	});
</script>
@endsection
