<table id="tableDepartamentos" class="display compact" width="100%" cellspacing="0">
        <thead>
            <tr>
                 <th>#</th>
                <th>Tipo</th>
                <th>Web</th>
                <th>Encargado</th>
                <th>Telefono</th>
                <th>E-mail</th>
                <th>Campus/Sede</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Tipo</th>
                <th>Web</th>
                <th>Encargado</th>
                <th>Telefono</th>
                <th>E-mail</th>
                <th>Campus/Sede</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
        <tbody>
	@foreach($departamentos as  $item)
	<tr data-id="{{ $item->id }}">

		<td>{{$item->id}}</td>
        <td>{{$item->tipo}}</td>
        <td>{{$item->sitio_web}}</td>
        <td>{{$item->nombre_encargado}}</td>
        <td>{{$item->telefono}}</td>
        <td>{{$item->email}}</td>
		<td>{{$item->campusSedeR->nombre}}</td>
		<td>
			<a href="">Edit</a>
			<a href="" class="btn-delete">Del</a>
		</td>
	</tr>
	@endforeach	
       </tbody>
    </table>