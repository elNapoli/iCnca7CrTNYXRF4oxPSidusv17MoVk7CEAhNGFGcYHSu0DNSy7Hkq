<div class="panel-body" id='postulacion_universidad' style='display:none'>

        <div class="col-lg-6">
                  


            <div class="form-group">
                {!! Form::label('semestre', 'Semestres de intercambio:') !!}
                <div class="radio">
                    <label>
                        {!! Form::radio('semestre', 'semestre_1',false,array('id'=>'semestre_1'))!!} Primer semestre ( Marzo - Julio)
                    </label>
                </div>
                <div class="radio">
                    <label>
                    {!! Form::radio('semestre', 'semestre_2',false,array('id'=>'semestre_2'))!!} Segundo semestre ( Agosto - Diciembre)
                    </label>
                </div>
                <div class="radio">
                    <label>
                    {!! Form::radio('semestre', 'semestre_3',false,array('id'=>'semestre_3'))!!} Año académico (Marzo - Diciembre)
                    </label>
                </div>
                <div class="radio">
                    <label>
                    {!! Form::radio('semestre', 'semestre_4',false,array('id'=>'semestre_4'))!!} Año académico (Agosto - Julio)
                    </label>
                </div>
                <div class="radio">
                    <label>
                    {!! Form::radio('semestre', 'otro',false,array('id'=>'otro'))!!} Otra fecha
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                
                <div class="row" id='otra_fecha' style='display:none'>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Desde</span>
                           
                            {!! Form::text('desde',null,array('id'=>'desde','class' => 'form-control'));!!}

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Hasta</span>
                            {!! Form::text('hasta',null,array('id'=>'hasta','class' => 'form-control'));!!}

                        </div>
                    </div>
                </div>
            </div>

            
                {!!  Form::label('financiamiento', 'Financiamiento ')!!}
            <div class="input-group input-prepend dropdown" id='FinanciamientoDDList'>
                      
              <span class="input-group-addon" data-toggle='dropdown' style="border: 1px solid #c2c2c2;"><a href="" class='dropdown-display'>{{$parametros['financiamiento_nombre']}}</a> <i class='caret'></i></span>
              {!! Form::text('descripcion',$parametros['descripcion'],array('id'=>'descripcion','class' => 'form-control hidden_on','placeholder'=>'descripción'));!!}
                {!!Form::hidden('financiamiento', $parametros['financiamiento'],array('id'=>'financiamiento','class'=>'dropdown-field'));!!}
              

              <ul class='dropdown-menu' style=" z-index: 1000;">
                  <li>
                    <a href="#"  onClick="toggleHidden('on')" data-value="1">Padres</a>
                  </li>
                  <li>
                    <a href="#" onClick="toggleHidden('on')" data-value="2">Universidad</a>
                  </li>
                  <li>
                    <a href="#" onClick="toggleHidden('on')" data-value="3">Yo</a>
                  </li>
                  <li>
                    <a href="#" onClick="toggleHidden('on')" data-value="4">Beca</a>
                  </li>
                  <li>
                    <a href="#" onClick="toggleHidden('off')" data-value="5">Otro</a>
                  </li>
              </ul>
            </div>
            


            <div class="form-group">
                {!!  Form::label('anio', 'Año de intercambio ')!!}
                {!! Form::number('anio',null,array('min'=>'2015','class' => 'form-control','placeholder'=>'Ej: 2015'));!!}
            </div>
      


        </div>
        <div class="col-lg-6">
            @include('postulacion.partials.fields_2')
            @include('postulacion.postulacion_universidad.postgrado.fields')







           
        </div>
          
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
{!!Form::hidden('urlStoreInformacion',url('prepostulacionuniversidad/store'),array('id'=>'urlStoreInformacion'));!!}
{!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
{!!Form::hidden('getCampusByPais', url('universidades/universidad-by-pais'),array('id'=>'getCampusByPais'));!!}
{!!Form::hidden('getUrlFacultadByCampus', url('facultades/facultades-by-campus'),array('id'=>'getUrlFacultadByCampus'));!!}

{!!Form::hidden('getUrlFinanciamientos', url('financiamientos/financiamientos'),array('id'=>'getUrlFinanciamientos'));!!}
{!!Form::hidden('getUrlCarreraByFacultad', url('carreras/carreras-by-facultad'),array('id'=>'getUrlCarreraByFacultad'));!!}

{!!Form::hidden('pais_id',$parametros['pais'],array('id'=>'pais_id'));!!}
{!!Form::hidden('campus_sede_id',$parametros['campus_sede'],array('id'=>'campus_sede_id'));!!}
{!!Form::hidden('facultad_id',$parametros['facultad'],array('id'=>'facultad_id'));!!}
{!!Form::hidden('carrera_id',$parametros['carrera'],array('id'=>'carrera_id'));!!}
{!!Form::hidden('id',$parametros['id'],array('id'=>'id'));!!}

</div>

<style type="text/css">
    .hidden_on{

        visibility: hidden;
    }
    .hidden_off{

        visibility: visible;
    }
</style>