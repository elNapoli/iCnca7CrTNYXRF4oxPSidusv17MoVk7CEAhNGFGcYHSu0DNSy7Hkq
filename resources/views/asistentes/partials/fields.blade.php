<div class="row">
<div class="col-md-6">
<div class="form-group">
    <div class="form-group">
    {!!  Form::label('beneficio', ' Agregar beneficio ')!!}
    {!!  Form::select('beneficio', [null=>'Seleccione un beneficio']+$beneficios,null,array('class' => 'form-control'))!!}

    <button id='add_b' type="button" class="btn btn-info btn-block">Agregar</button>
    </div>

               <br>
               <div id="message2"></div>
    @include('asistentes.partials.table_2')

</div> 
</div>
<div class="col-md-6">
<div class="form-group">

        <fieldset disabled>
        <div class="form-group">
            {!!  Form::label('nombre', ' Nombre asistente ');!!}
            {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Beca Bicentenario'));!!}
        </div> 

        <div class="form-group">
            {!!  Form::label('$post', ' Postulante ');!!}
            {!! Form::text('$post',null,array('class' => 'form-control','placeholder'=>$post->nombre.' '.$post->apellido_paterno.' '.$post->apellido_materno));!!}
        </div> 

        </fieldset>

        {!!  Form::label('indicaciones', ' Indicaciones ');!!}
        {!! Form::textarea('indicaciones',null,array('class' => 'form-control','placeholder'=>'Ej: Beca Bicentenario', 'rows'=>'6'));!!}
        <br>
        <button type="submit" class="btn btn-info">Editar y finalizar</button>
    
    

    </div>
</div>

</div>


