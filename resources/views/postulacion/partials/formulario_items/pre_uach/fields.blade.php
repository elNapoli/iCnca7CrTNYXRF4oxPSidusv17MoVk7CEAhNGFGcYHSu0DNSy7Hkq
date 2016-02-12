<div id="preUach" style="display: none">
    
    <div class="form-group">
        {!!  Form::label('email_institucional', 'E-mail institucional ')!!}
        {!! Form::text('email_institucional',null,array('class' => 'form-control','placeholder'=>'Ej: javier.andrade@uach.cl'));!!}
    </div>

    <div class="form-group">
        {!!  Form::label('grupo_sanguineo', 'Grupo sanguíneo ')!!}
        {!! Form::text('grupo_sanguineo',null,array('class' => 'form-control','placeholder'=>'B+'));!!}
    </div>

    <div class="form-group">
        {!!  Form::label('enfermedades', 'Enfermedades ')!!}
        {!! Form::text('enfermedades',null,array('class' => 'form-control','placeholder'=>'Diabetes'));!!}
    </div>

    <div class="form-group">
        {!!  Form::label('telefono_2', 'Teléfono ')!!}
        {!! Form::text('telefono_2',null,array('class' => 'form-control','placeholder'=>'+56912345678'));!!}
    </div>
    <div class="form-group">
        {!!  Form::label('ciudad_2', ' Nombre de la ciudad ')!!}
        {!!  Form::select('ciudad_2', [null=>'Seleccione ciudad']+$ciudades,null,array('class' => 'form-control ciudad'))!!}
    </div>
    <div class="form-group">
        {!!  Form::label('direccion_2', 'Direccion actual ')!!}
        {!! Form::text('direccion_2',null,array('class' => 'form-control','placeholder'=>'+56912345678'));!!}
    </div>
</div>