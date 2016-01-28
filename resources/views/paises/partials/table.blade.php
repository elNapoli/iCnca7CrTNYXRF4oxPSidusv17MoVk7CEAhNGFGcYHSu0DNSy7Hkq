<table id="tablePais" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Nombre continente</th>
				<th>Acción</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
				<th>Nombre</th>
				<th>Nombre continente</th>
				<th>Acción</th>

            </tr>
        </tfoot>
        <tbody>
	@foreach($paises as  $item)
	<tr data-id="{{ $item->id }}">

		<td><a href="{{ url('paises/edit', $item->id)}}">{{$item->id}}</a></td>
		<td>{{$item->nombre}}</td>
		<td>{{$item->continenteR->nombre}}</td>
		<td>
			<a href="{{ url('paises/edit', $item->id)}}">Edit</a>
			<a href="" class="btn-delete">Del</a>
		</td>
	</tr>
	@endforeach	
       </tbody>
    </table>

