@extends('intranet.app')

@section('Dashboard') Beneficios @endsection

@section('content')


<div class="panel panel-default">
	<div class="panel-body">
<div class="form-group">

    {!!  Form::label('titulo', ' Titulo de la noticia ');!!}
    {!! Form::text('titulo',null,array('class' => 'form-control','placeholder'=>'Ej: Ingrese el titulo de su noticia'));!!}
</div>  

<div class="form-group">

    {!!  Form::label('resumen', 'Resumen ');!!}
    {!! Form::textarea('resumen',null,array('class' => 'form-control','placeholder'=>null,'rows'=>'3'));!!}
</div>  

<div class="form-group">

    {!!  Form::label('cuerpo', 'Cuerpo');!!}
    {!! Form::textarea('cuerpo',null,array('class' => 'form-control','placeholder'=>null));!!}
</div>  
{!!Form::hidden('id','',array('id'=>'id'));!!}
</div>  


</div>
</div>

@endsection