<div class="form-horizontal">
      <div class="col-lg-6">
            <div class="form-group">
              {!!  Form::label('nombre_estudiante', 'Nombre del estudiante: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('nombre_estudiante',null,array('class' => 'form-control','disabled'=>''));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('n_pasaporte', 'Número de pasaporte: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('n_pasaporte',null,array('class' => 'form-control','disabled'=>''));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('direccion', 'Dirección en el extranjero: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('direccion',null,array('class' => 'form-control'));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('ciudad_pais', 'Ciudad y país en el extranjero: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('ciudad_pais',null,array('class' => 'form-control','disabled'=>''));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('telefono_1', 'Teléfono en el extranjero: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('telefono_1',null,array('class' => 'form-control'));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('telefono_2', 'Celular en el extranjero: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('telefono_2',null,array('class' => 'form-control'));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('conocido_extranjero', 'Contacto de algún conocido en el extranjero: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('conocido_extranjero',null,array('class' => 'form-control'));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('nombre_seguro', 'Nombre del seguro internacional: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('nombre_seguro',null,array('class' => 'form-control'));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('numero_seguro', 'Número del seuro internacional: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('numero_seguro',null,array('class' => 'form-control'));!!}

              </div>
            </div>

      </div>

      <div class="col-lg-6">



            

            <div class="form-group">
              {!!  Form::label('validez_seguro', 'Validez exacta del seguro internacional: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('validez_seguro',null,array('class' => 'form-control'));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('nombre_hospital', 'Nombre del Hospital más cercano a tu lugar de residencia:',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('nombre_hospital',null,array('class' => 'form-control'));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('direccion_hospital', 'dirección Hospital más cercano a tu lugar de residencia: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('direccion_hospital',null,array('class' => 'form-control'));!!}

              </div>
            </div>

            <div class="form-group">
              {!!  Form::label('nombre_contacto', 'Nombre de algún familiar en chile para casos de emergencia: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('nombre_contacto',null,array('class' => 'form-control','disabled'=>''));!!}

              </div>
            </div>
            <div class="form-group">
              {!!  Form::label('tel_contacto', 'Teléfono/Celular del contacto en Chile: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('tel_contacto',null,array('class' => 'form-control','disabled'=>''));!!}

              </div>
            </div>
            <div class="form-group">
              {!!  Form::label('parentesco_contacto', 'Parentesco del contacto en Chile: ',array('class'=>'col-lg-5 control-label'));!!}

              <div class="col-lg-6">
                {!! Form::text('parentesco_contacto',null,array('class' => 'form-control','disabled'=>''));!!}

              </div>
            </div>
        <a class="btn-info btn" id='guardarContactoExtranjero' href="#!">Guardar</a>
    {!!Form::hidden('postulante', null,array('id'=>'postulante'));!!}

      </div>


 
 


</div>