<div class="col-lg-3">
<div class="form-group">
  	{!!  Form::label('continente', ' Gráficos ')!!}
	{!!  Form::select('principal', ['0'=>'Seleccione un gráfico',
                                  '1'=>'Postulante por geografia',
                                  '2'=>'Universidad',
                                  '3'=>'Otras estadisticas'],
                                  null,array('class' => 'form-control',
                                  'id'=>'principal'))!!}

</div>

</div>

{!!Form::hidden('id','',array('id'=>'id'));!!}
