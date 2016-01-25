<table class="table table-striped">

	<tr>

		<th> #</th>
		<th>Nombre</th>
		<th>País</th>
		<th>Continente</th>
		<th>Acción</th>



	</tr>
	@foreach($ciudades as  $item)
	<tr data-id="{{ $item->id }}">

		<td>{{$item->ciudadID}}</td>
		<td>{{$item->ciudadNombre}}</td>
		<td>{{$item->paisNombre}}</td>
		<td>{{$item->continenteNombre}}</td>


		<td>
			<a href="{{ route('ciudades.edit', $item->ciudadID)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

			<a href="#!" class="btn btn-danger btn-delete"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span></a>
			
		</td>

	</tr>
	@endforeach	
</table>