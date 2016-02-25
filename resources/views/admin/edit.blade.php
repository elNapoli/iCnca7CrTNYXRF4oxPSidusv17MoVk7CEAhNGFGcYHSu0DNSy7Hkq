@extends('layout.register.app_ad')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{  trans('users.edit').': ' }}{{  $user->name }}
				</div>

			
				<div class="panel-body">


					@include('partials.error')
 					{!! Form::model($user, ['route'=>['admin.usuarios.update',$user->id], 'method'=>'PUT']) !!}

						 @include('usuarios.partials.fields')
	

						  <button type="submit" class="btn btn-default">Editar Usuario</button>
 					{!!Form::close()!!}


			

				</div>
			 @include('usuarios.partials.delete')

		</div>
	</div>
</div>

@endsection