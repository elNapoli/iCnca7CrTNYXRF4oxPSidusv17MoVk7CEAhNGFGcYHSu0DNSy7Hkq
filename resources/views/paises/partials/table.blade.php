<table class="table table-striped">

	<tr>
		<th>#</th>
		<th>Nombre</th>
		<th>Nombre continente</th>
		<th>Acción</th>
	</tr>
	@foreach($paises as  $item)
	<tr data-id="{{ $item->id }}">
		<td>{{ $item->id}}</td>
		<td>{{$item->nombre}}</td>
		<td>{{$item->continenteR->nombre}}</td>

		<td>
			<a href="{{ route('paises.edit', $item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

			<a href="#!" class="btn btn-danger btn-delete"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span></a>
			
		</td>

	</tr>
	@endforeach	
</table>