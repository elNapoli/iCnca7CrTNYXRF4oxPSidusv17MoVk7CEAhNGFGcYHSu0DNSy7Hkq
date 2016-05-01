<div class="form-group">
        {!!  Form::label('continente', ' Seleccione el continente ',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
        {!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'form-control'))!!}
    </div>
</div>

<div class="form-group">
        {!!  Form::label('pais', ' Seleccione el país',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
        {!!  Form::select('pais', [null=>'Seleccione un país'],null,array('class' => 'form-control'))!!}
    </div>
</div>

<div class="form-group">
        {!!  Form::label('nombre_universidad', ' Nombre de la Universidad',array('class'=>'col-sm-2 col-sm-2 control-label'))!!}
    <div class="col-sm-10">
        {!! Form::text('nombre_universidad',null,array('class' => 'form-control','placeholder'=>'Ej: Universidad Austral de Chile'));!!}
    </div>
</div>
