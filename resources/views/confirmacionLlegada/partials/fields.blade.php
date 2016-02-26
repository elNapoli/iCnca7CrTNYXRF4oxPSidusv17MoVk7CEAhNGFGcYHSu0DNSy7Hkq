<div class="form-group">
    {!!  Form::label('nombre_universidad_destino', 'Nombre de la institución: ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}

    <div class="col-lg-10">
    {!! Form::text('nombre_universidad_destino',null,array('class' => 'form-control','disabled'=>''));!!}

    </div>
</div>


<div class="form-group">
    {!!  Form::label('nombre_coordinador', 'Coordinador:',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}

    <div class="col-lg-10">
    {!! Form::text('nombre_coordinador',null,array('class' => 'form-control','disabled'=>''));!!}

    </div>
</div>
<h4>Datos personales del estudiante</h4>
<div class="form-group">
    {!!  Form::label('nombre_estudiante', 'Nombre completo: ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}

    <div class="col-lg-10">
    {!! Form::text('nombre_estudiante',null,array('class' => 'form-control','disabled'=>''));!!}

    </div>
</div>

<div class="panel panel-green">
    <div class="panel-heading">
        <h5>Cursos en la universidad de destino</h5>
    </div>
    <div class="panel-body">
        <ul>
            @foreach ($parametros['asignaturas_homologadas'] as $asignatura)

            <li><strong>{{$asignatura['codigo_asignatura_intercambio'] .':    '}}</strong>{{$asignatura['nombre_asignatura_intercambio']}}</li>
            @endforeach
        </ul>
    </div>

</div>

<h4>Confirmación de Arribo y Registro</h4>
<div class="form-group">
    {!!  Form::label('fecha_llegada', 'Fecha de presentación en Institución de 
    Destino: ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}

    <div class="col-lg-10">
    {!! Form::text('fecha_llegada',null,array('class' => 'form-control'));!!}

    </div>
</div>
<div class="form-group">
    {!!  Form::label('fecha_inicio_curso', 'Fecha inicio de cursos: ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}

    <div class="col-lg-10">
    {!! Form::text('fecha_inicio_curso',null,array('class' => 'form-control'));!!}

    </div>
</div>
<div class="form-group">
    {!!  Form::label('fecha_termino_curso', 'Fechas término de cursos: ',array('class'=>'col-sm-2 col-sm-2 control-label'));!!}

    <div class="col-lg-10">
    {!! Form::text('fecha_termino_curso',null,array('class' => 'form-control'));!!}

    </div>
</div>
{!!Form::hidden('postulante', null,array('id'=>'postulante'));!!}


<a class="btn-info btn" id='guardarConfirmacion' href="#!">Guardar</a>

		
      	
	{!!Form::hidden('postulante', null,array('id'=>'postulante'));!!}
