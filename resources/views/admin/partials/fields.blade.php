<div class='col-lg-12'>

<div class="form-group">
    {!!  Form::label('name', ' Nombre ');!!}
    {!! Form::text('name',null,array('class' => 'form-control','placeholder'=>'Ej: Bruce'));!!}
</div>
<div class="form-group">
    {!!  Form::label('apellido_paterno', ' Apellido ');!!}
    {!! Form::text('apellido_paterno',null,array('class' => 'form-control','placeholder'=>'Ej: Dickinson'));!!}
</div> 

<div class="form-group">
    {!!  Form::label('email', ' E-mail ');!!}
    {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: chuck@schuldiner.com'));!!}
    {!!Form::hidden('id','',array('id'=>'id'));!!}
</div>     

<div class="form-group">
    {!!  Form::label('confirmado', ' Estado ')!!}
    {!!  Form::select('confirmado', [null=>'Seleccione estado',
                               0=>'Por confirmar',
                               1=>'Confirmado',
                               2=>'Acceso denegado',
                               3=>'Acceso restituido'],null,array('class' => 'form-control'))!!}
</div>
</div>  