<div class="col-lg-3">
<div class="form-group">
  	{!!  Form::label('continente', ' Filtro principal ')!!}
	{!!  Form::select('principal', ['0'=>'Seleccione un filtro',
                                  '1'=>'Postulante',
                                  '2'=>'Universidad',
                                  '3'=>'Otras estadisticas'],
                                  null,array('class' => 'form-control',
                                  'id'=>'principal'))!!}
</div>

</div>
<div class="col-lg-3">
<div class="form-group">
  <br>
<button type="button" class="btn btn-info" id="graf">Graficar</button>
</div>
</div>


{!!Form::hidden('id','',array('id'=>'id'));!!}
