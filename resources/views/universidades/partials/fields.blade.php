<div class="tab-pane fade in active" id="casaCentral">


    <div class="form-group">

        {!!  Form::label('nombre', ' Nombre del campus ');!!}
        {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Isla Teja'));!!}
    </div>  
    <div class="form-group">

        {!!  Form::label('telefono', ' N° Telefónico ');!!}
        {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej:+560632222222'));!!}
    </div>  
    <div class="form-group">

        {!!  Form::label('fax', ' Nombre N° fax ');!!}
        {!! Form::text('fax',null,array('class' => 'form-control','placeholder'=>'Ej: +560632222222'));!!}
    </div>  
    <div class="form-group">

        {!!  Form::label('sitio_web', ' sitio web del campus ');!!}
        {!! Form::text('sitio_web',null,array('class' => 'form-control','placeholder'=>'Ej: www.uach.cl'));!!}
    </div>  

    <div class="form-group">
        {!!  Form::label('ciudad', ' Nombre de la ciudad ')!!}
        {!!  Form::select('ciudad', [null=>'Seleccione ciudad'],null,array('class' => 'form-control miCiudad'))!!}
    </div>
    @if(isset($infoUniversidad))
    {!!Form::hidden('infoUniversidad', $infoUniversidad,array('id'=>'infoUniversidad'));!!}



    @endif
    {!!Form::hidden('getUrlPaisContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisContinente'));!!}
    {!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}
    {!!Form::hidden('getUrlGuardarCampus', url('universidades/store-campus'),array('id'=>'getUrlGuardarCampus'));!!}

    {!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}

</div>