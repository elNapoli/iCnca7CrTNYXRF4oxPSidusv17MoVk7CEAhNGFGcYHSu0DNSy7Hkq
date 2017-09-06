    <div class="panel-body" id='datos_personales' style="display:none">
        <div class="col-lg-6">

            <div class="form-group">
                {!!  Form::label('apellido_paterno', 'Apellido paterno ')!!}
                {!! Form::text('apellido_paterno',null,array('class' => 'form-control','placeholder'=>'Ej: Aburto'));!!}
            </div>


            <div class="form-group">
                {!!  Form::label('apellido_materno', 'Apellido materno ')!!}
                {!! Form::text('apellido_materno',null,array('class' => 'form-control','placeholder'=>'Ej: Vidal'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('nombre', 'Nombres ')!!}
                {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Felipe Andrés'));!!}
            </div>
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                    {!!  Form::label('tipo', 'Tipo de documento ')!!}
                    {!!  Form::select('tipo', [null=>'Seleccione documento','ci'=>'Cédula nacional de identidad','p'=>'Pasaporte'],null,array('class' => 'form-control'))!!}
                </div>
              </div>
              <div class="col-xs-6">
                {!!  Form::label('numero', 'N° Documento');!!}
                <div class="input-group">
                {!! Form::text('numero',null,array('class' => 'form-control','placeholder'=>'Ej: 4450398-9'));!!}

                  <span class="input-group-btn" id='spamAddDocumento' style='display:none'>
                    <a href="#!" class="btn btn-default" id='open_modal_documento_identidad' type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
                  </span>
                </div>


              </div>
            </div>


            <div class="form-group">
              {!!  Form::label('fecha_nacimiento', 'Fecha nacimiento ')!!}
                {!! Form::text('fecha_nacimiento',null,array('class' => 'form-control'));!!}
            </div>

            <div class="form-group">
                {!! Form::label('sexo', 'Sexo:') !!}
                <label class="radio-inline">
                    {!! Form::radio('sexo', 'f')!!} Femenino
                </label>
                <label class="radio-inline">
                    {!! Form::radio('sexo', 'm')!!} Masculino
                </label>

            </div>




            <div class="form-group">
                {!!  Form::label('email_personal', 'E-mail ')!!}
                {!! Form::text('email_personal',null,array('class' => 'form-control','placeholder'=>'Ej: juan.perez@gmail.com'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('telefono', 'Teléfono ')!!}
                {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej: +89963897733'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('continente', ' Nombre Continente ')!!}
                {!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'continente form-control'))!!}
            </div>


            <div class="form-group">
                {!!  Form::label('pais', ' Nombre país ')!!}
                {!!  Form::select('pais', [null=>'Seleccione un país']+$paises,null,array('class' => 'pais form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('ciudad', ' Nombre de la ciudad ')!!}
                {!!  Form::select('ciudad', [null=>'Seleccione ciudad']+$ciudades,null,array('class' => 'form-control ciudad'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('direccion', 'Dirección ')!!}
                {!! Form::text('direccion',null,array('class' => 'form-control','placeholder'=>'Ej: Gral Lagos #8984'));!!}
            </div>




        </div>
        <div class="col-lg-6">
            
            <div class="form-group">
                {!!  Form::label('nacionalidad', 'Nacionalidad ')!!}
                {!! Form::text('nacionalidad',null,array('class' => 'form-control','placeholder'=>'Ej: Chileno'));!!}
            </div>


            <div class="form-group">
                {!!  Form::label('lugar_nacimiento', 'Lugar de nacimiento ')!!}
                {!! Form::text('lugar_nacimiento',null,array('class' => 'form-control','placeholder'=>'Ej: Osorno'));!!}
            </div>


            <div class="form-group">
                {!!  Form::label('como_se_entero', 'Como se enteró de nosotros? ')!!}
                {!!  Form::select('como_se_entero', [null=>'Seleccione una opción','Internet'=>'Internet',
                            'Noticia'=>'Noticia',
                            'Me contó un amigo'=>'Me contó un amigo',
                            'Correo electronico'=>'Correo electronico'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('nivel_de_español', 'Cual es su nivel de español? ')!!}
                {!!  Form::select('nivel_de_español', [null=>'Seleccione nivel','Bajo'=>'Bajo',
                            'Medio'=>'Medio',
                            'Alto'=>'Alto',
                            'Nativo'=>'Nativo'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-horizontal">
              <div class="form-group">
                <div class="col-lg-4">
                    {!! Form::label('tipo_estudio', 'Tipo de postulación:') !!}
                </div>
                <div class="col-lg-8">
                <div class="form-group">
                    
                  <label class="radio-inline">
                        {!!  Form::radio('tipo_estudio', 'Pregrado', false,array('class'=>'','id'=>'tipo_estudio_1'));!!} Estudiante pregrado
                    </label>
                </div>
                <div class="form-group">
                    
                  <label class="radio-inline">
                        {!!  Form::radio('tipo_estudio', 'Postgrado',false,array('id'=>'tipo_estudio_2'));!!} Estudiante postgrado
                    </label>
                </div>

                </div>
              </div>

            </div>

            <div class="form-horizontal" style="display: none" id="div_titulo_profesional">
              <div class="form-group">
                <div class="col-lg-4">
                    {!! Form::label('titulo_profesional', 'Título profesional:') !!}
                </div>
                <div class="col-lg-8">
                <div class="form-group">
                {!! Form::text('titulo_profesional',null,array('class' => 'form-control','placeholder'=>'Ej: Ingenierio Civil en Informática'));!!}
                    
                </div>

                </div>
              </div>
            </div>


            <div class="form-horizontal">
              <div class="form-group">
                <div class="col-lg-4">
                {!! Form::label('procedencia', 'Procedencia:') !!}
                </div>
                <div class="col-lg-8">

                <div class="form-group">
                    
                  <label class="radio-inline">
                        {!!  Form::radio('procedencia', 'NO UACH', false,array('id'=>'procedencia_1'));!!} Estudiante Extranjero
                    </label>
                </div>
                <div class="form-group">
                    
                  <label class="radio-inline">
                        {!!  Form::radio('procedencia', 'UACH',false,array('class'=>'','id'=>'procedencia_2'));!!} Estudiante UACH
                    </label>
                </div>

                </div>
              </div>

            </div>


            @include('postulacion.datos_personales.pre_uach.fields')

        </div>
    <!-- /.row (nested) -->
{!!Form::hidden('urlStoreInformacion',url('postulacion/store'),array('id'=>'urlStoreInformacion'));!!}
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}

{!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}
{!!Form::hidden('getUrCiudadContinente', url('ciudades/ciudad-by-pais'),array('id'=>'getUrCiudadContinente'));!!}
{!!Form::hidden('id_postulante',null,array('id'=>'id_postulante'));!!}


</div>