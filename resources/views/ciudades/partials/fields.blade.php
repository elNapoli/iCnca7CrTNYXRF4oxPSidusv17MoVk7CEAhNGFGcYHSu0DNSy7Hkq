<div class="form-group">
  	{!!  Form::label('continente', ' Nombre Continente ')!!}
	{!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'form-control'))!!}
</div>

<div class="form-group">
  	{!!  Form::label('pais', ' Nombre país ')!!}
	{!!  Form::select('pais', [null=>'Seleccione un país'],null,array('class' => 'form-control'))!!}
</div>

<div class="form-group">

{!!  Form::label('nombre', 'Nombre Ciudad');!!}
{!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Valdivia'));!!}
</div>

<div class="form-group">

{!!  Form::label('codigo_postal', 'Código postal de la ciudad');!!}
{!! Form::text('codigo_postal',null,array('class' => 'form-control','placeholder'=>'Ej: 5090000'));!!}
</div>








{!!Form::hidden('getUrl', url('ciudades/pais-by-continente'),array('id'=>'getUrl'));!!}
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}



@section('scripts')




<script type="text/javascript">

	$(document).ready(function(){

			$('#continente').on('change',function(e){
			e.preventDefault();
 			getListForSelect($('#getUrl').val(), $('#getToken').val(), $("#continente").val(), 'pais');	
			});


	});



</script>



@endsection