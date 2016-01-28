<div class="form-group">

    {!!  Form::label('name', ' Nombre');!!}
    {!! Form::text('name',null,array('class' => 'form-control','placeholder'=>'Ingrese nombre'));!!}
  </div>

    <div class="form-group">

    {!!  Form::label('apellido_paterno', ' Apellido paterno');!!}
    {!! Form::text('apellido_paterno', null ,array('class' => 'form-control','placeholder'=>'Ingrese apellido paterno'));!!}
  </div>

  <div class="form-group">

    {!!  Form::label('apellido_materno', 'Apellido Materno');!!}
    {!! Form::text('apellido_materno',null,array('class' => 'form-control','placeholder'=>'Ingrese apellido materno'));!!}
  </div>

  <div class="form-group">

    {!!  Form::label('email', ' Correo electronico');!!}
    {!! Form::text('email',null ,array('class' => 'form-control','placeholder'=>'Ingrese correo electronico'));!!}
  </div>

  <div class="form-group">

    {!!  Form::label('password', ' Contraseña');!!}
    {!! Form::password('password',array('class' => 'form-control','placeholder'=>'Contraseña'));!!}
  </div>