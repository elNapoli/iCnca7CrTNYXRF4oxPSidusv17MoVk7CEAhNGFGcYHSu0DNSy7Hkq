<div class="row">
<div class="col-md-6">
<div class="form-group">

<div class="form-group">


    {!!  Form::label('titulo', ' Titulo de la noticia ');!!}
    {!! Form::text('titulo',null,array('class' => 'form-control','placeholder'=>'Ej: Ingrese el titulo de su noticia'));!!}
</div>  
<div class="form-group">

    {!!  Form::label('resumen', 'Resumen ');!!}
    {!! Form::textarea('resumen',null,array('class' => 'form-control','placeholder'=>null,'rows'=>'3'));!!}
</div>  

</div> 
</div>



</div>

<div class="form-group">

    {!!  Form::label('cuerpo_noticia', 'Cuerpo');!!}
    {!! Form::textarea('cuerpo_noticia',null,array('class' => 'form-control','placeholder'=>null, 'id'=>'cuerpo_noticia'));!!}
    <br>
     <button type="submit" class="btn-primary btn"> Guardar Noticia</button>
</div>  
{!!Form::hidden('id','',array('id'=>'id'));!!}
</div>  

                    
                   