@extends('layout.app')

@section('content')
<div class="panel panel-green">
	       <div class="panel-heading text-center">
            Debug tipo estudiante : {{$procedencia}} <br>
        </div>
	</div>
<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-0" ></div>
    <div class="col-md-12" >

		<div class="panel panel-default">
			@include('partials.success')
	<table border="0" cellspacing="0" cellpadding="0">
       <tbody>     
         <tr>
           	<th>
				  <div class="panel-heading"><a class="btn-info btn" href="{{ url('pdf/invoice-download')}}">Descargar Formulario Postulante</a></div>
           	</th>
           	<th>
		  			<div class="panel-heading"><a class="btn-info btn" href="">Descargar  Homologacion</a></div>
           	</th>
         </tr>
         <tr>
           	<th>
		  			<div class="panel-heading"><a class="btn-info btn" href="{{ url('pdf/invoice')}}">Visualizar Formulario Postulante</a></div>
           	</th>
           	<th>
		  			<div class="panel-heading"><a class="btn-info btn" href="">Visualizar Homologacion</a></div>
           	</th>
         </tr>                          
       </tbody>
      </table>



		  <!-- Table -->
	

		</div>
    </div>

</div>


@endsection