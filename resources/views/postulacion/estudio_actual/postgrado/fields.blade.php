<div class="form-group">
    {!!  Form::label('nombreD', ' Nombre del tutor académico de su universidad (o director de tesis si corresponde) ')!!}
    {!! Form::text('nombreD',null,array('class' => 'form-control','placeholder'=>'Ej: Juan Perez'))!!}
</div>  

<div class="form-group">
    {!!  Form::label('emailD', ' E-mail del director ')!!}
    {!! Form::text('emailD',null,array('class' => 'form-control','placeholder'=>'Ej: Juan.perez@gmail.com'))!!}
</div>  

<div class="form-group">
    {!!  Form::label('cargoD', ' Cargo actual del director ')!!}
    {!! Form::text('cargoD',null,array('class' => 'form-control','placeholder'=>'Ej: Director de Informática'))!!}
</div>  

<div class="form-group">
    {!!  Form::label('nombreS', ' Nombre de la secretaria ')!!}
    {!! Form::text('nombreS',null,array('class' => 'form-control','placeholder'=>'Ej: Maria Delgado'))!!}
</div>  


<div class="form-group">
    {!!  Form::label('telefonoS', ' Teléfono de la secretaria ')!!}
    {!! Form::text('telefonoS',null,array('class' => 'form-control','placeholder'=>'Ej: +56632268698'))!!}
</div>  

<div class="form-group">
    {!!  Form::label('area', ' Área ')!!}
    {!! Form::text('area',null,array('class' => 'form-control','placeholder'=>'Ej: Biología'))!!}
</div>  