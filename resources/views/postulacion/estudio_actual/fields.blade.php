<div class="panel-body" id="estudios_actuales" style='display:none'>
        <div class="col-lg-6">
            @include('postulacion.partials.fields')
            @include('postulacion.estudio_actual.fields-info-procedencia')


        </div>

        <div class="col-lg-6">
          
            


            @include('postulacion.estudio_actual.pre_uach.fields')
            @include('postulacion.estudio_actual.pre_no_uach.fields')

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
    {!! Form::hidden('pais_id',$parametros['pais'],array('id'=>'pais_id'));!!}
    {!! Form::hidden('campus_sede_id',$parametros['campus_sede'],array('id'=>'campus_sede_id'));!!}
    {!! Form::hidden('facultad_id',$parametros['facultad'],array('id'=>'facultad_id'));!!}
    {!! Form::hidden('carrera_id',$parametros['carrera'],array('id'=>'carrera_id'));!!}
    {!! Form::hidden('getUrlCoordinadorCampus',url('departamentos/info-coordinador'),array('id'=>'getUrlCoordinadorCampus'));!!}


    <!-- /.row (nested) -->
</div>