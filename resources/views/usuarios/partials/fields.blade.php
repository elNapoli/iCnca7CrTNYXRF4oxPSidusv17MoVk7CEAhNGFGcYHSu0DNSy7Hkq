<div class="form-group">

    {!!  Form::label('name', ' Nombre');!!}
    {!! Form::text('name',null,array('class' => 'form-control','placeholder'=>'Nombre Completo'));!!}
  </div>
  <div class="form-group">

    {!!  Form::label('email', 'Apellido Materno');!!}
    {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Correo Electrónico'));!!}
  </div>

  <div class="form-group">

    {!!  Form::label('password', ' Contraseña');!!}
    {!! Form::password('password',array('class' => 'form-control','placeholder'=>'Contraseña'));!!}
  </div>


  