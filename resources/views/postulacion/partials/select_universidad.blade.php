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
    {!!  Form::label('facultad', 'Seleccione una facultad  ')!!}
    {!!  Form::select('facultad', [null=>'Seleccione una facultad'],null,array('class' => 'form-control'))!!}
</div>

<div class="form-group">
    {!!  Form::label('carrera', 'Seleccione una carrera  ')!!}
    {!!  Form::select('carrera', [null=>'Seleccione una carrera'],null,array('class' => 'form-control'))!!}
</div>
