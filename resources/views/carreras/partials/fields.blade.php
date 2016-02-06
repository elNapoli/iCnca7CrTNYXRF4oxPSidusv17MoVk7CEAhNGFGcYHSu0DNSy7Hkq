<div class="col-lg-6">
<div class="form-group">
  	{!!  Form::label('continente', ' Nombre Continente ')!!}
	{!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'form-control'))!!}
</div>
<div class="form-group">
  	{!!  Form::label('pais', ' Nombre país ')!!}
	{!!  Form::select('pais', [null=>'Seleccione un pais'],null,array('class' => 'form-control'))!!}
</div>
<div class="form-group">
  	{!!  Form::label('campus_sede', ' Nombre Universidad ')!!}
	{!!  Form::select('campus_sede', [null=>'Seleccione un continente'],null,array('class' => 'form-control'))!!}
</div>
<div class="form-group">
  	{!!  Form::label('facultad', ' Nombre facultad ')!!}
	{!!  Form::select('facultad', [null=>'Seleccione un continente'],null,array('class' => 'form-control'))!!}
</div>

</div>
<div class="col-lg-6">
<div class="form-group">

    {!!  Form::label('nombre', ' Nombre carrera ');!!}
    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Ingeniería Civil en Informática'));!!}
</div>  

<div class="form-group">

    {!!  Form::label('director', 'Director de carrera ');!!}
    {!! Form::text('director',null,array('class' => 'form-control','placeholder'=>'Ej:Jorge Maturana'));!!}
</div>  

<div class="form-group">

    {!!  Form::label('email', 'E-mail director ');!!}
    {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: j.maturana@uach.cl'));!!}
</div>  
</div>  