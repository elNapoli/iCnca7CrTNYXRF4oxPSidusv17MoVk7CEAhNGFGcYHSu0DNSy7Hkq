    {!!  Form::label('facultad', 'Seleccione una facultad  ')!!}
<div class="input-group">
    {!!  Form::select('facultad', [null=>'Seleccione una facultad'],null,array('class' => 'form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>

    {!!  Form::label('carrera', 'Seleccione una carrera  ')!!}
<div class="input-group">
    {!!  Form::select('carrera', [null=>'Seleccione una carrera'],null,array('class' => 'form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" id='add_carrera' class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>