<div class="panel-body">

        <div class="col-lg-6">


            <div class="form-group">
                {!!  Form::label('campus_sede', 'Seleccione Campus/Sede ')!!}
                {!!  Form::select('campus_sede', [null=>'Seleccione campus']+$facultades,null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('facultad', 'Seleccione facultad')!!}
                {!!  Form::select('facultad', [null=>'Seleccione facultad'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('carrera', 'Seleccione Carrera ')!!}
                {!!  Form::select('carrera', [null=>'Seleccione carrera'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('nombre_director', 'Nombre del director de carrera')!!}
                {!! Form::text('nombre_director',null,array('class' => 'form-control'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('email_director', 'E-mail del director de carrera')!!}
                {!! Form::text('email_director',null,array('class' => 'form-control'));!!}
            </div>

            




        </div>
        <div class="col-lg-6">
          
            <div class="row">
              <div class="col-xs-6">
	            <div class="form-group">
	                {!!  Form::label('anio_ingreso', 'Año de ingreso a la carrera ')!!}
	                {!! Form::text('anio_ingreso',null,array('class' => 'form-control','placeholder'=>'Ej: 2008'));!!}
	            </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">

                {!!  Form::label('ranking', 'Ranking de su promoción');!!}
                {!! Form::text('ranking',null,array('class' => 'form-control','placeholder'=>'Ej: 60'));!!}
                </div>

              </div>
            </div>


            <div class="form-group">
                {!!  Form::label('beneficios', 'Mencione beneficios; becas y créditos vigentes ')!!}
                {!!  Form::textarea('beneficios')!!}
            </div>
        </div>
   
    {!!Form::hidden('urlStoreInformacion',url('preuestudioactual/store'),array('id'=>'urlStoreInformacion'));!!}
    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
    <!-- /.row (nested) -->
</div>