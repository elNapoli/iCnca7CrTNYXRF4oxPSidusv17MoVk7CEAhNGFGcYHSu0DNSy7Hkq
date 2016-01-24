@extends('layout.app')

@section('Dashboard') País @endsection

@section('content')



<div class="col-md-1" ></div>
<div class="col-md-5" >

	@include('partials.error')

	{!! Form::model($pais, ['route'=>['paises.update',$pais->id], 'method'=>'PUT']) !!}

	@include('paises.partials.fields')

		<button type="submit" class="btn btn-default">Editar</button>

	{!!Form::close()!!}


		{!! Form::open(['route'=>['paises.destroy',$pais->id], 'method'=>'DELETE']) !!}
			<button  tye="submit" onClick="return confirm('Esta seguro de eliminar el registro?')" class="btn-danger btn"> Eliminar continente</button>
		{!! Form::close()!!}
</div>



@endsection