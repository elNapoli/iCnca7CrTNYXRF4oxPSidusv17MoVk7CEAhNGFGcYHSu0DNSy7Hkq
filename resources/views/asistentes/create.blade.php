@extends('layout.app')

@section('Dashboard') Asistente @endsection

@section('content')



<div class="col-md-1" ></div>
    <div class="col-md-5" >

		@include('partials.error')

		{!! Form::open(['url'=>'asistentes/store', 'method'=>'POST'])!!}

		<div class="form-group">


    {!!  Form::label('nombre', ' Nombre asistente ');!!}
    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ingrese nombre de El/La Asistente'));!!}

    {!!  Form::label('postulate', ' Postulante ');!!}
    {!! Form::text('postulante',null,array('class' => 'form-control','placeholder'=>'Ingrese el postulante'));!!}


    {!!  Form::label('indicaciones', ' Indicaciones ');!!}
    {!! Form::textarea('indicaciones',null,array('class' => 'form-control','placeholder'=>'Ingrese indicaciones', 'rows'=>'3'));!!}


    </div>  



		<button type="submit" class="btn btn-default">Guardar y Continuar</button>
		{!!Form::close()!!}
	</div>



@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('beneficiosCrear') !!}
@endsection