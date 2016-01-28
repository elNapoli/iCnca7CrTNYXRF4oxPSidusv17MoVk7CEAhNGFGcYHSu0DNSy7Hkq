@extends('layout.app')

@section('Dashboard') Facultades @endsection

@section('content')

<div class="row">
	  <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-6" >

		<div class="panel panel-default">

			@include('partials.success')
		  <div class="panel-heading"><a class="btn-info btn" href="{{ url('facultades/create')}}">Crear facultad</a></div>

		  <!-- Table -->
			@include('facultades.partials.table')
	

		</div>
    </div>

</div>




@endsection


@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#tablePais').DataTable( {
		    	'ajax': $('#indexUrl').val(),
		    	"columns": [
		                 { "data": "id",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html("<a href='facultades/edit/"+oData.id+"'>"+oData.id+"</a>");
                }
            },
		                 { "data": "nombre" },
		                 { "data": "campus_sede.nombre" },
		                 { "data": "campus_sede.universidad_r.nombre" }
		        ],
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
		    } );
		} );

	</script>
@endsection