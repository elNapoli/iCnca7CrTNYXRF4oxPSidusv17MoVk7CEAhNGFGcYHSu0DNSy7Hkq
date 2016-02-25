<div id="infoExtraEstudioUACH" style="display: none">
	{!!  Form::label('director', 'Director')!!}
	<div class="input-group">
	        {!! Form::text('director',null,array('class' => 'form-control',' disabled'=>' disabled'))!!}
	  <span class="input-group-btn">
	    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-edit" aria-hidden="true"></span></a>
	  </span>
	</div>


        {!!  Form::label('email', 'E-mail')!!}
	<div class="input-group">
        {!! Form::text('email',null,array('class' => 'form-control',' disabled'=>' disabled'))!!}
	  <span class="input-group-btn">
	    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-edit" aria-hidden="true"></span></a>
	  </span>
	</div>


</div>




<div id="infoExtraEstudioNOUACH" style="display: none">
    <div class="form-group">
        {!!  Form::label('nombre_encargado', 'Nombre del coordinador')!!}
        {!! Form::text('nombre_encargado',null,array('class' => 'form-control',' disabled'=>' disabled'))!!}
    </div> 
    <div class="form-group">
        {!!  Form::label('telefono', 'Teléfono')!!}
        {!! Form::text('telefono',null,array('class' => 'form-control',' disabled'=>' disabled'))!!}
    </div>  

    <div class="form-group">
        {!!  Form::label('email', 'E-mail')!!}
        {!! Form::text('email',null,array('class' => 'form-control',' disabled'=>' disabled'))!!}
    </div>  
 
</div>


