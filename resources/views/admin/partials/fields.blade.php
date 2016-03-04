<div class='col-lg-12'>

<div class="form-group">
    {!!  Form::label('name', ' Nombre ');!!}
    {!! Form::text('name',null,array('class' => 'form-control','placeholder'=>'Ej: Bruce'));!!}
</div>
<div class="form-group">
    {!!  Form::label('apellido_paterno', ' Apellido paterno ');!!}
    {!! Form::text('apellido_paterno',null,array('class' => 'form-control','placeholder'=>'Ej: Dickinson'));!!}
</div> 
<div class="form-group">
    {!!  Form::label('apellido_materno', ' Apellido materno ');!!}
    {!! Form::text('apellido_materno',null,array('class' => 'form-control','placeholder'=>'Ej: Mustaine'));!!}
</div>
<div class="form-group">
    {!!  Form::label('email', ' E-mail ');!!}
    {!! Form::text('email',null,array('class' => 'form-control','placeholder'=>'Ej: chuck@schuldiner.com'));!!}
    {!!Form::hidden('id','',array('id'=>'id'));!!}
</div>     
</div>  