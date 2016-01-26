<table id="tablePais" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Nombre continente</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
				<th>Nombre</th>
				<th>Nombre continente</th>
            </tr>
        </tfoot>
        <tbody>
	@foreach($paises as  $item)
	<tr data-id="{{ $item->id }}">

		<td><a href="{{ route('paises.edit', $item->id)}}">{{$item->id}}</a></td>
		<td>{{$item->nombre}}</td>
		<td>{{$item->continenteR->nombre}}</td>

	</tr>
	@endforeach	
       </tbody>
    </table>

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#tablePais').DataTable( {
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        }
		    } );
		} );

	</script>
@endsection