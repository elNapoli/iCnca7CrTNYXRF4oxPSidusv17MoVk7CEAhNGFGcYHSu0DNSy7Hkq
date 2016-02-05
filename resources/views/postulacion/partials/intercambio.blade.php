<div class="panel-body">

        <div class="col-lg-6">

            <div class="form-group">
                {!! Form::label('semestre', 'Semester:') !!}
                <label class="radio-inline">
                    {!! Form::radio('semestre', 'semestre 1',array('id'=>'semestreI'))!!} Semestre I
                </label>
                <label class="radio-inline">
                    {!! Form::radio('semestre', 'semestre 2',array('id'=>'semestreII'))!!} Semestre II
                </label>
                <label class="radio-inline">
                    {!! Form::radio('semestre', 'ambos',array('id'=>'semestreIII'))!!} Todo el Año
                </label>

            </div>

            <div class="form-group">
                {!!  Form::label('anio', 'Año de intercambio ')!!}
                {!! Form::text('anio',null,array('class' => 'form-control','placeholder'=>'Ej: 1027'));!!}
            </div>


            <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                    {!!  Form::label('tipo', 'Otro ')!!}

                </div>
              </div>
              <div class="col-xs-8">

                <div class="input-group input-daterange">

                    {!! Form::text('desde',null,array('class' => 'form-control','value'=>'2012-04-05'));!!}

                    <span class="input-group-addon">to</span>
                    {!! Form::text('hasta',null,array('class' => 'form-control','value'=>'2012-04-05'));!!}
                  
                </div>

              </div>
            </div>


        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!!  Form::label('continente', ' Nombre Continente ')!!}
                {!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'continente form-control'))!!}
            </div>


            <div class="form-group">
                {!!  Form::label('pais', ' Nombre país ')!!}
                {!!  Form::select('pais', [null=>'Seleccione un país'],null,array('class' => 'universidad form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('campus_sede', 'Seleccione la universidad  ')!!}
                {!!  Form::select('campus_sede', [null=>'Selecasdfasdfcione la universidad'],null,array('class' => 'form-control'))!!}
            </div>
            <div class="form-group">
                {!!  Form::label('facultad', 'Seleccione una facultad  ')!!}
                {!!  Form::select('facultad', [null=>'Seleccione una facultad'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('carrera', 'Seleccione una carrera  ')!!}
                {!!  Form::select('carrera', [null=>'Seleccione una carrera'],null,array('class' => 'form-control'))!!}
            </div>
        </div>
          
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
{!!Form::hidden('urlStoreInformacion',url('prepostulacionuniversidad/store'),array('id'=>'urlStoreInformacion'));!!}

</div>
