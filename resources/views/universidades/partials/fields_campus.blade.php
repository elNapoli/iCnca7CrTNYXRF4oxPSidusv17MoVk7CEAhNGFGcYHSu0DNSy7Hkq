
<div class="form-group">
    {!!  Form::label('nombre', ' Nombre del campus ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}
    <div class="col-sm-10">
    {!! Form::text('nombre','CASA CENTRAL',array('class' => 'form-control','placeholder'=>'Ej: Isla Teja'));!!}
    </div>
</div>

<div class="form-group">
    {!!  Form::label('telefono', ' N° Telefónico ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}
    <div class="col-sm-10">
    {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej:+560632222222'));!!}
    </div>
</div>

<div class="form-group">
    {!!  Form::label('fax', ' Nombre N° fax ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}
    <div class="col-sm-10">
    {!! Form::text('fax',null,array('class' => 'form-control','placeholder'=>'Ej: +560632222222'));!!}
    </div>
</div>

<div class="form-group">
    {!!  Form::label('sitio_web', ' sitio web del campus ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}
    <div class="col-sm-10">
    {!!  Form::select('ciudad', [null=>'Seleccione ciudad'],null,array('class' => 'form-control miCiudad'))!!}
    </div>
</div>

<div class="form-group">
    {!!  Form::label('direccion', 'Dirección',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}
    <div class="col-sm-10">
    {!! Form::text('direccion',null,array('class' => 'form-control','placeholder'=>'Ej:Picarte $8922'));!!}
    </div>
</div>


@if(isset($infoUniversidad))
{!!Form::hidden('infoUniversidad', $infoUniversidad,array('id'=>'infoUniversidad'));!!}

@endif

{!!Form::hidden('getUrlGuardarCampus', url('universidades/store-campus'),array('id'=>'getUrlGuardarCampus'));!!}

{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}

    <a href="#!" id="add_universidad" class="btn btn-default">Guardar</a>