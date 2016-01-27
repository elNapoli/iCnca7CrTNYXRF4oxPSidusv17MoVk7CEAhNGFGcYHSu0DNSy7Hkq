@extends('layout.app')

@section('Dashboard') Continentes @endsection

@section('content')



<div class="col-md-1" ></div>
<div class="col-md-5" >

	@include('partials.error')

	{!! Form::model($continente, ['route'=>['continentes.update',$continente->id], 'method'=>'PUT']) !!}

	@include('continentes.partials.fields')

		<button type="submit" class="btn btn-default">Editar</button>

	{!!Form::close()!!}


		{!! Form::open(['route'=>['continentes.destroy',$continente->id], 'method'=>'DELETE']) !!}
			<button  tye="submit" onClick="return confirm('Esta seguro de eliminar el registro?')" class="btn-danger btn"> Eliminar continente</button>
		{!! Form::close()!!}
</div>



@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('continenteEditar',$continente) !!}
@endsection