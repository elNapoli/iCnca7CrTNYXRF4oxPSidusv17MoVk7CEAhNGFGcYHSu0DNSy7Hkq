<div class="form-group">
    {!!  Form::label('instituto', ' Instituto ')!!}
    {!! Form::text('instituto',null,array('class' => 'form-control','placeholder'=>'Ej: Instituto de informática'))!!}
</div>  

<div class="form-group">
    {!!  Form::label('nomLab', ' Laboratorio en el que desee participar ')!!}
    {!! Form::text('nomLab',null,array('class' => 'form-control','placeholder'=>'Ej: Laboratorio X'))!!}
</div>  

<div class="form-group">
    {!!  Form::label('area', ' Área ')!!}
    {!! Form::text('area',null,array('class' => 'form-control','placeholder'=>'Ej: Medicina'))!!}
</div>  



<div class="form-group">
    {!!  Form::label('contacto', ' Nombre de contacto de la Universidad destino  ')!!}
    {!! Form::text('contacto',null,array('class' => 'form-control','placeholder'=>'Ej: Macarena Agüero'))!!}
</div>  


    {!! Form::hidden('tipo_estudio',$parametros['tipo_estudio'],array('id'=>'tipo_estudio'));!!}
