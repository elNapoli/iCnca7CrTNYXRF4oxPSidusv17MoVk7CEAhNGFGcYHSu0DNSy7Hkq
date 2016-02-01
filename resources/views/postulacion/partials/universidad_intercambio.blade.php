<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
        	<div class="form-group">
                {!!  Form::label('continente', ' Nombre Continente ')!!}
                {!!  Form::select('continente', [null=>'Seleccione un continente'],null,array('class' => 'form-control'))!!}
            </div>


            <div class="form-group">
                {!!  Form::label('pais', ' Nombre país ')!!}
                {!!  Form::select('pais', [null=>'Seleccione un país'],null,array('class' => 'form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('ciudad', ' Nombre de la ciudad ')!!}
                {!!  Form::select('ciudad', [null=>'Seleccione ciudad'],null,array('class' => 'form-control miCiudad'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('universidad', 'Seleccione la universidad  ')!!}
                {!!  Form::select('universidad', [null=>'Seleccione la universidad'],null,array('class' => 'form-control miCiudad'))!!}
            </div>


            <div class="form-group">
                {!!  Form::label('carrera', 'Carrera')!!}
                {!! Form::text('carrera',null,array('class' => 'form-control','placeholder'=>'Ej: Ingeniería Civil en Informática'));!!}
            </div>

        </div>
        <div class="col-lg-6">
            

            

        </div>
    </div>
    <!-- /.row (nested) -->
</div>