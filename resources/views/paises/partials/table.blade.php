




<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <table id="tablePais" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Nombre continente</th>
				<th>Acción</th>
            </tr>
        </thead>

        <tbody>
	@foreach($paises as  $item)
	<tr data-id="{{ $item->id }}">

		<td><a href="{{ url('paises/edit', $item->id)}}">{{$item->id}}</a></td>
		<td>{{$item->nombre}}</td>
		<td>{{$item->continenteR->nombre}}</td>
		<td>
              <a href="{{ url('paises/edit', $item->id)}}" class="model-open-edit btn btn-primary btn-xs" id="{{ $item->id }}"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-danger btn-delete btn-xs" id="{{ $item->id }}"><i class="fa fa-trash-o "></i></a>
        </td>

	</tr>
	@endforeach	
       </tbody>
    </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
