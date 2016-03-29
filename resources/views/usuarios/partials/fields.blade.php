<div class="form-group">

    {!!  Form::label('name', ' Nombre ',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
    {!! Form::text('name',null,array('class' => 'form-control','placeholder'=>'Ej: Patricio'));!!}

    </div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>


<div class="form-group">

    {!!  Form::label('apellido_paterno', ' Apellidos ',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
    {!! Form::text('apellido_paterno',null,array('class' => 'form-control','placeholder'=>'Ej: Ulloa Molina'));!!}

    </div>
</div>

<div class="form-group">

    {!!  Form::label('email', ' E-mail ',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
    {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: patricio@gmail.com'));!!}

    </div>
</div>

<div class="form-group">

    {!!  Form::label('password_actual', ' Contraseña actual',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-4">
    {!! Form::password('password_actual',array('class' => 'form-control','id'=>'password','placeholder'=>'Contraseña'));!!}

    </div>
    <div class="col-sm6">
        <a href="" class="col-sm-3 col-sm-3 control-label"  data-toggle="modal" data-target="#moda_cambiar_contrasenia" href="#!"> Cambiar contraseña
        </a>

   

    </div>
</div>
<div class="text-center">
    
<button type="submit" class="btn btn-primary">Guardar cambios</button>
</div>

