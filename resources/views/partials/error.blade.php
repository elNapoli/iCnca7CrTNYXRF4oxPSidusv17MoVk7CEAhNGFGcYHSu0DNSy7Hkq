@if($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<p> Porfavor corregir los siguientes errores </p>

		@foreach($errors->all() as $error)
			<li>{{  $error }}</li>
		@endforeach
	</div>
@endif




