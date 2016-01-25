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

			$.get('/getpais?id='+id_continente,function(data){

				alert(data);
			});

		});
	</script>

@endsection
