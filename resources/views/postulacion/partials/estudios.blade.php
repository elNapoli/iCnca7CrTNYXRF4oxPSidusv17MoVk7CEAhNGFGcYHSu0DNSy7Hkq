<div class="panel-body">
        <div class="col-lg-6">
            @include('postulacion.partials.fields')
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
    {!!Form::hidden('getUrlPaisByContinente', url('ciudades/pais-by-continente'),array('id'=>'getUrlPaisByContinente'));!!}

    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}
    <!-- /.row (nested) -->
</div>