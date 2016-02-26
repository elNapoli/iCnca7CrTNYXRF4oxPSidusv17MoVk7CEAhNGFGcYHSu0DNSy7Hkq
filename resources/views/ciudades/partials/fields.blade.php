<div class="form-group">
  	{!!  Form::label('continente', ' Nombre Continente ')!!}
	{!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'continente form-control'))!!}
</div>

<div class="form-group">
  	{!!  Form::label('pais', ' Nombre país ')!!}
	{!!  Form::select('pais', [null=>'Seleccione país'],null,array('class' => 'pais form-control'))!!}
</div>

<div class="form-group">

{!!  Form::label('nombre', 'Nombre Ciudad');!!}
{!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Valdivia'));!!}
</div>

<div class="form-group">

{!!  Form::label('codigo_postal', 'Código postal de la ciudad');!!}
{!! Form::text('codigo_postal',null,array('class' => 'form-control','placeholder'=>'Ej: 5090000'));!!}
</div>








{!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}

{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
{!!Form::hidden('id_ciudad', null,array('id'=>'id_ciudad'));!!}

@if(isset($ciudad))
{!!Form::hidden('idPais', $ciudad->pais,array('id'=>'idPais'));!!}
@endif

