<div class="panel-body">
        <div class="col-lg-6">
            @include('postulacion.partials.fields')
            @include('postulacion.estudio_actual.fields-info-procedencia')


        </div>

        <div class="col-lg-6">
          
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                    {!!  Form::label('anio_ingreso', 'Año de ingreso a la carrera ')!!}
                    {!! Form::text('anio_ingreso',null,array('class' => 'form-control','placeholder'=>'Ej: 2008'));!!}
                </div>
              </div>
   
            </div>


            @include('postulacion.estudio_actual.pre_uach.fields')

        </div>
   
    {!!Form::hidden('urlStoreInformacion',url('preuestudioactual/store'),array('id'=>'urlStoreInformacion'));!!}
    {!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
    {!!Form::hidden('getCampusByPais', url('universidades/universidad-by-pais'),array('id'=>'getCampusByPais'));!!}
    {!!Form::hidden('getUrlFacultadByCampus', url('facultades/facultades-by-campus'),array('id'=>'getUrlFacultadByCampus'));!!}
    {!!Form::hidden('getUrlCarreraByFacultad', url('carreras/carreras-by-facultad'),array('id'=>'getUrlCarreraByFacultad'));!!}
    {!!Form::hidden('getUrlDirectorCarrera', url('carreras/director'),array('id'=>'getUrlDirectorCarrera'));!!}

    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
    {!! Form::hidden('tipo_estudio',$parametros['tipo_estudio'],array('id'=>'tipo_estudio'));!!}
    {!! Form::hidden('procedencia',$parametros['procedencia'],array('id'=>'procedencia'));!!}
    {!! Form::hidden('postulante',$parametros['postulante'],array('id'=>'postulante'));!!}

    <!-- /.row (nested) -->
</div>