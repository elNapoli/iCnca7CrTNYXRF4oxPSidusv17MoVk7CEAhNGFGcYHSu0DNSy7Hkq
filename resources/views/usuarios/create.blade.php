@extends('layout.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
						Nuevo Usuario
				</div>

				<div class="panel-body">
						 @include('partials.error')
			 	
 					{!! Form::open(['route'=>'admin.usuarios.store', 'method'=>'POST'])!!}

						 @include('usuarios.partials.fields')
	

						  <button type="submit" class="btn btn-default">Guardar</button>
 					{!!Form::close()!!}
				</div>

			</div>

		</div>
	</div>
</div>

@endsection
