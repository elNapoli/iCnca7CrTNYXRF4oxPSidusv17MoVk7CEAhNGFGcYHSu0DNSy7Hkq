<div class="panel-body">

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
                {!!  Form::label('carrera', 'Carrera')!!}
                {!! Form::text('carrera',null,array('class' => 'form-control','placeholder'=>'Ej: Ingeniería Civil en Informática'));!!}
            </div>

        </div>
        <div class="col-lg-6">
            

            

        </div>

    <!-- /.row (nested) -->
</div>