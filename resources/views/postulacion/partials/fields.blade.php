    {!!  Form::label('continente', ' Nombre Continente ')!!}
<div class="input-group">
    {!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'continente form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>

    {!!  Form::label('pais', ' Nombre país ')!!}
<div class="input-group">
    {!!  Form::select('pais', [null=>'Seleccione un país'],null,array('class' => 'universidad form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>



    {!!  Form::label('campus_sede', 'Seleccione la universidad  ')!!}
<div class="input-group">
    {!!  Form::select('campus_sede', [null=>'Selecasdfasdfcione la universidad'],null,array('class' => 'form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>

@if($parametros['tipo_estudio'] === "Pregrado")
<div id="select_uach_estudio">
  @include('postulacion.estudio_actual.pre_uach.fields_select')
</div>

@else
 <div class="form-group">
    {!!  Form::label('programa', 'Programa')!!}
  {!!  Form::select('programa', [null=>'Seleccione su programa','Magister'=>'Magíster',
                                'Doctorado'=>'Doctorado',
                                'cursos'=> 'Cursos o seminarios',
                                'estancia'=> 'estancia de investigación',
                                'practicas'=> 'Prácticas de laboratorio',
                                'diplomados'=> 'Diplomados/Especialidades',
                                'otros'=>'Otros'],null,array('class' => 'form-control'))!!}
</div>

<div class="form-group">
    {!!  Form::label('nombreP', ' Nombre del programa ')!!}
    {!! Form::text('nombreP',null,array('class' => 'form-control','placeholder'=>'Ej: Magíster en Biotecnología Bioquímica'))!!}
</div>  
  @endif


