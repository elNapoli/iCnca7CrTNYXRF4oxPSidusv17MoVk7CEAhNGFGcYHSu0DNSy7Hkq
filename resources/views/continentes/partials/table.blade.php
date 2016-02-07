<table id="tableContinente" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                 <th>#</th>
                <th>Nombre</th>
                <th>Acción</th>

            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
        </tfoot>
        <tbody>
	@foreach($continentes as  $item)
	<tr data-id="{{ $item->id }}">

		<td><a href="#!" class='model-open-edit' id="{{ $item->id }}" >{{$item->id}}</a></td>
		<td>{{$item->nombre}}</td>
		<td>
			<a href= "#!" class='model-open-edit' id="{{ $item->id }}">Edit</a>
			<a href="" class="btn-delete" id="{{ $item->id }}">Del</a>
		</td>
	</tr>
	@endforeach	
       </tbody>
    </table>

