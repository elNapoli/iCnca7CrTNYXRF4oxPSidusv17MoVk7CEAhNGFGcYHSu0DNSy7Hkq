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