@extends('intranet.app')

@section('Dashboard') Beneficios @endsection

@section('content')


<div class="panel panel-default">
	<div class="panel-body">
<div class="form-group">

    {!!  Form::label('nombre', ' Titulo de la noticia ');!!}
    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Ingeniería Civil en Informática'));!!}
</div>  

<div class="form-group">

    {!!  Form::label('director', 'Director de carrera ');!!}
    {!! Form::text('director',null,array('class' => 'form-control','placeholder'=>'Ej:Jorge Maturana'));!!}
</div>  

<div class="form-group">

    {!!  Form::label('email', 'E-mail director ');!!}
    {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: j.maturana@uach.cl'));!!}
</div>  
{!!Form::hidden('id','',array('id'=>'id'));!!}
</div>  


</div>
</div>

@endsection