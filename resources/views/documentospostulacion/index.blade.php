@extends('intranet.app')

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
      @include('documentospostulacion.partials.table')

		  <!-- Table -->
	

		</div>
    </div>

</div>


@endsection


@section('scripts')
<script type="text/javascript">
$(document).ready(function (){

//Opciones tablas
        $('#tableDocumentos').DataTable( {
          "bProcessing": true,
          'searching':false,
          'paging':false,

           "autoWidth": false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        } );
 });


</script>
@endsection