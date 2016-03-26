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

    {!!  Form::label('password', ' Contraseña ',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
    {!! Form::password('password',array('class' => 'form-control','id'=>'password','placeholder'=>'Contraseña'));!!}

    </div>
</div>

<div class="form-group">

    {!!  Form::label('password_confirmation', ' Repita contraseña',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
    {!! Form::password('password_confirmation',array('class' => 'form-control','id'=>'password','placeholder'=>'Repita  contraseña'));!!}

    </div>
</div>

<button type="submit" class="btn btn-primary">Guardar cambios</button>

