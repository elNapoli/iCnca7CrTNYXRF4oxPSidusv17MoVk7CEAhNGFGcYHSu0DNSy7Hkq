<table class="table table-striped">

	<tr>

		<th> #</th>
		<th>Nombre</th>
		<th>Email</th>
		<th>Acciones</th>
	</tr>
	@foreach($users as  $item)
	<tr data-id="{{ $item->id }}">

		<td>{{$item->id}}</td>
		<td>{{$item->name}}</td>
		<td>{{$item->email}}</td>
		<td>
			<a href="{{ route('admin.usuarios.edit', $item->id)}}">Editar</a>
			<a href="#!" class="btn-delete">Eliminar</a>
		</td>

	</tr>
	@endforeach	
</table>