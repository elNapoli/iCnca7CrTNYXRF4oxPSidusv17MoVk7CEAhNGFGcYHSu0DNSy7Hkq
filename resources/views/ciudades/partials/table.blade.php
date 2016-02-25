<table id="tableCiudad" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
				<th> #</th>
				<th>Nombre</th>
				<th>Código postal</th>
				<th>País</th>
				<th>Continente</th>
				<th>Acción</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th> </th>
				<th>Nombre</th>
				<th>Código postal</th>
				<th>País</th>
				<th>Continente</th>
				<th>Acción</th>

            </tr>
        </tfoot>
        <tbody>
	@foreach($ciudades as  $item)
	<tr data-id="{{ $item->ciudadID }}">

		<td><a href="{{ url('ciudades/edit', $item->ciudadID)}}">{{$item->ciudadID}}</a></td>
		<td>{{$item->ciudadNombre}}</td>
		<td>{{$item->codigo_postal}}</td>
		<td>{{$item->paisNombre}}</td>
		<td>{{$item->continenteNombre}}</td>
		<td>
			<a href="{{ url('ciudades/edit', $item->ciudadID)}}">Edit</a>
			<a href="" class="btn-delete">Del</a>
		</td>

	</tr>
	@endforeach	
       </tbody>
    </table>

