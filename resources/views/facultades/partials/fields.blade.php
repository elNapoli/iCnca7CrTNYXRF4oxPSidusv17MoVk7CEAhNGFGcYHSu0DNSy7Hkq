<div class="form-group">
  	{!!  Form::label('universidad', ' Seleccione Universidad ')!!}
	{!!  Form::select('universidad', [null=>'Seleccione un continente']+$universidades,null,array('class' => 'form-control'))!!}
</div>

<div class="form-group">
  	{!!  Form::label('campus_sede', ' Seleccione Campus ')!!}
	{!!  Form::select('campus_sede', [null=>'Seleccione un campus'],null,array('class' => 'form-control'))!!}
</div>

<div class="form-group">

{!!  Form::label('nombre', 'Nombre Ciudad');!!}
{!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Facultad de Ingeniería'));!!}
</div>

<div class="form-group">

{!!  Form::label('telefono', 'Nombre Ciudad');!!}
{!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej: +5622222222'));!!}
</div>

    {!!Form::hidden('urlCampusByUniversidad', url('facultades/campus-by-universidad'),array('id'=>'urlCampusByUniversidad'));!!}
	{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}

