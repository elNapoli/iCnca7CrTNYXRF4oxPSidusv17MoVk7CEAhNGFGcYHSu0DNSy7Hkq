@extends('layout.app')

@section('content')



<div class="col-md-0" ></div>
<div class="col-md-12" >

	@include('partials.error')

	{!! Form::model($asignatura, ['url'=>['asignaturas/update',$asignatura->codigo], 'method'=>'PUT']) !!}

	@include('asignaturas.partials.fields2')

		<button type="submit" class="btn btn-default">Editar</button>

	{!!Form::close()!!}

</div>



@endsection

