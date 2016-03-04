<div class="col-lg-6">

<div class="form-group">
  	{!!  Form::label('tipo', ' Tipo ')!!}
	{!!  Form::select('tipo', [null=>'Seleccione un tipo','contacto'=>'Contacto de emergencia','representante'=>'Representante legal'],null,array('class' => 'form-control'))!!}
</div>
<div class="form-group">

    {!!  Form::label('nombre', ' Nombre ');!!}
    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Patricio Aguilar'));!!}
</div> 

<div class="form-group">

    {!!  Form::label('telefono_1', ' Teléfono casa ');!!}
    {!! Form::text('telefono_1',null,array('class' => 'form-control','placeholder'=>'Ej: +56212345678'));!!}
</div> 

<div class="form-group">

    {!!  Form::label('telefono_2', ' Teléfono personal ');!!}
    {!! Form::text('telefono_2',null,array('class' => 'form-control','placeholder'=>'Ej: +56912345678'));!!}
</div> 
</div>
<div class="col-lg-6">
<div class="form-group">

    {!!  Form::label('parentesco', ' Parentesco ');!!}
    {!! Form::text('parentesco',null,array('class' => 'form-control','placeholder'=>'Ej: Hermano'));!!}
</div>  


<div class="form-group">

    {!!  Form::label('email', 'E-mail ');!!}
    {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: patricio.a@gmail.cl'));!!}
</div>  
<div class="form-group">

    {!!  Form::label('direccion', 'Dirección ');!!}
    {!! Form::text('direccion',null,array('class' => 'form-control','placeholder'=>'Ej:Perez rosales 7878'));!!}
</div>  
</div>  


