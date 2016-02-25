<table id="tableContinente" class="display compact" width="100%" cellspacing="0">
        <thead>
            <tr>
                 <th>#</th>
                <th>Nombre</th>
                <th>A. paterno</th>
                <th>A. materno</th>
                <th>E-mail</th>
                <th>Confirmado</th>
                <th>Tipo</th>
                <th>Opciones</th>              
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>A. paterno</th>
                <th>A. materno</th>
                <th>E-mail</th>
                <th>Tipo</th>  
                <th>Confirmado</th>
                <th>Opciones</th>

            </tr>
        </tfoot>
        <tbody>
	@foreach($users as  $item)
	<tr data-id="{{ $item->id }}">
		<td>{{$item->id}}</td>
		<td>{{$item->name}}</td>
		<td>{{$item->apellido_paterno}}</td>
		<td>{{$item->apellido_materno}}</td>
		<td>{{$item->email}}</td>
		<td>{{$item->tipo_usuario}}</td>
		@if ( $item->confirmado )
			<td>{{'Si'}}</td>
			@else
				<td>{{'No'}}</td>
		@endif
		<td>
			<a href="{{ route('admin.usuarios.edit', $item->id)}}">Edit</a>
			<a href="" class="btn-delete">Del</a>
		</td>
	</tr>
	@endforeach	
       </tbody>
    </table>

