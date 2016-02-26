 <div class="form-group">
  	{!!  Form::label('continente', ' Nombre Continente ')!!}
	{!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'form-control'))!!}
</div>
<div class="form-group">
    {!!  Form::label('nombre', ' Nombre del País ')!!}
    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Chile'))!!}
</div>  
{!!Form::hidden('id','',array('id'=>'id'));!!}



