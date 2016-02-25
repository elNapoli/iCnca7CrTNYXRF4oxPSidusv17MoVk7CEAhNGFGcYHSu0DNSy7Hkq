@if($errors->any())
	<div class="alert-danger alert">
		<p> Porfavor corregir los siguientes errores </p>

		@foreach($errors->all() as $error)
			<li>{{  $error }}</li>
		@endforeach
	</div>
@endif