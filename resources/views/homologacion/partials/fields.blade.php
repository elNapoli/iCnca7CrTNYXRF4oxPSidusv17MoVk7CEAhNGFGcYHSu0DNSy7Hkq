<div class="row">
    <div class="col-lg-6">
        
        <div class="form-horizontal" role="form">
          <div class="form-group">
            {!!  Form::label('nombre', 'Nombre: ',array('class'=>'col-lg-4 control-label'));!!}

            <div class="col-lg-8">
            {!! Form::text('nombre',null,array('class' => 'form-control','disabled'=>''));!!}

            </div>
          </div>

          <div class="form-group">
            {!!  Form::label('email', 'E-mail: ',array('class'=>'col-lg-4 control-label'));!!}

            <div class="col-lg-8">
            {!! Form::text('email',null,array('class' => 'form-control','disabled'=>''));!!}

            </div>
          </div>

          <div class="form-group">
            {!!  Form::label('carrera', 'Carrera: ',array('class'=>'col-lg-4 control-label'));!!}

            <div class="col-lg-8">
            {!! Form::text('carrera',null,array('class' => 'form-control','disabled'=>''));!!}

            </div>
          </div>

          <div class="form-group">
            {!!  Form::label('universidad_destino', 'Institución de destino: ',array('class'=>'col-lg-4 control-label'));!!}

            <div class="col-lg-8">
            {!! Form::text('universidad_destino',null,array('class' => 'form-control','disabled'=>''));!!}

            </div>
          </div>
  

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-horizontal" role="form">
          <div class="form-group">
            {!!  Form::label('rut', 'RUT: ',array('class'=>'col-lg-4 control-label'));!!}

            <div class="col-lg-8">
            {!! Form::text('rut',null,array('class' => 'form-control','disabled'=>''));!!}

            </div>
          </div>

          <div class="form-group">
            {!!  Form::label('telefono', 'Teléfono: ',array('class'=>'col-lg-4 control-label'));!!}

            <div class="col-lg-8">
            {!! Form::text('telefono',null,array('class' => 'form-control','disabled'=>''));!!}

            </div>
          </div>

          <div class="form-group">
            {!!  Form::label('pga', 'PGA: ',array('class'=>'col-lg-4 control-label'));!!}

            <div class="col-lg-8">
            {!! Form::text('pga',null,array('data-toggle'=>'tooltip','title'=>'Promedio General Acumulado','class' => 'form-control'));!!}

            </div>
          </div>

          <div class="form-group">
            {!!  Form::label('pais_destino', 'País de destino: ',array('class'=>'col-lg-4 control-label'));!!}

            <div class="col-lg-8">
            {!! Form::text('pais_destino',null,array('class' => 'form-control','disabled'=>''));!!}

            </div>
          </div>
  

        </div>

    </div>
</div>