	@extends('layout.app')


@section('content')
 <div class="form-group">
  	{!!  Form::label('continente', ' Nombre Continente ')!!}
	{!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'form-control','id'=>'select1'))!!}
</div>




 <div class="form-group">
  	{!!  Form::label('continente', ' Nombre Continente ')!!}
	{!!  Form::select('continente', [null=>'Seleccione un continente'],null,array('class' => 'form-control'))!!}
</div>


@endsection


@section('script')
	<script type="text/javascript">

		$('#select1').on('change',function(e){

			
			var id_continente = e.target.value;

			$.ajax({
			    // En data puedes utilizar un objeto JSON, un array o un query string
			    data: {"parametro1" : "valor1", "parametro2" : "valor2"},
			    //Cambiar a type: POST si necesario
			    type: "GET",
			    // Formato de datos que se espera en la respuesta
			    dataType: "json",
			    // URL a la que se enviará la solicitud Ajax
			    url: '/ciudades/getPais?id=9',
			})
			 .done(function( data, textStatus, jqXHR ) {
			     if ( console && console.log ) {
			         console.log( "La solicitud se ha completado correctamente." );
			     }
			 })
			 .fail(function( jqXHR, textStatus, errorThrown ) {
			     if ( console && console.log ) {
			         console.log( "La solicitud a fallado: " +  textStatus);
			     }
			});

		});
	</script>

@endsection
