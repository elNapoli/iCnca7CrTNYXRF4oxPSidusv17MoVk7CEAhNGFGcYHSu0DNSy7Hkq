        <div class="form-group">


 <fieldset disabled>
            <div class="form-group">
                {!!  Form::label('campus_sede', ' Campus o Sede ');!!}
                {!! Form::text('#',null,array('class' => 'form-control','placeholder'=>$departamento->campusSedeR->nombre));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('tipo', ' Tipo de departamento ');!!}
                {!!  Form::select('tipo', [null=>'Seleccione tipo de departamento','Movilidad estudiantil'=>'Movilidad Estudiantil','Relaciones internacionales'=>'Relaciones Internacionales'],null,array('class' => 'form-control'))!!}
            </div>
</fieldset>

            <div class="form-group">
                {!!  Form::label('sitio_web', ' Sitio web ');!!}
                {!! Form::text('sitio_web',null,array('class' => 'form-control','placeholder'=>'Ej: www.uach.cl'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('nombre_encargado', ' Nombre del encargado ');!!}
                {!! Form::text('nombre_encargado',null,array('class' => 'form-control','placeholder'=>'Ingrese el nombre del encargado'));!!}
            </div>
                
            <div class="form-group">
                {!!  Form::label('telefono', ' Telefono ');!!}
                {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej: +569123456789'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('email', ' E-mail ');!!}
                {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: direccion@uach.cl'));!!}
            </div>


        <br>
    
    

        </div>