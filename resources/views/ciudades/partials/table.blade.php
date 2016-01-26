<table id="tableCiudad" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
				<th> #</th>
				<th>Nombre</th>
				<th>País</th>
				<th>Continente</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th> </th>
				<th>Nombre</th>
				<th>País</th>
				<th>Continente</th>
            </tr>
        </tfoot>
        <tbody>
	@foreach($ciudades as  $item)
	<tr data-id="{{ $item->id }}">

		<td><a href="{{ route('ciudades.edit', $item->id)}}">{{$item->ciudadID}}</a></td>
		<td>{{$item->ciudadNombre}}</td>
		<td>{{$item->paisNombre}}</td>
		<td>{{$item->continenteNombre}}</td>

	</tr>
	@endforeach	
       </tbody>
    </table>

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#tableCiudad').DataTable( {
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
		    } );
		} );

	</script>
@endsection