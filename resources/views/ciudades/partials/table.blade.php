<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <table id="tableCiudad" class="table table-striped table-bordered table-hover">
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
                    <tbody>
                @foreach($ciudades as  $item)
                <tr data-id="{{ $item->ciudadID }}">

                    <td><a href="{{ url('ciudades/edit', $item->ciudadID)}}">{{$item->ciudadID}}</a></td>
                    <td>{{$item->ciudadNombre}}</td>
                    <td>{{$item->codigo_postal}}</td>
                    <td>{{$item->paisNombre}}</td>
                    <td>{{$item->continenteNombre}}</td>
                    <td  align="center">
                          <a href="{{ url('ciudades/edit', $item->ciudadID)}}" class="model-open-edit btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-danger btn-delete btn-xs"><i class="fa fa-trash-o "></i></a>
                    </td>

                </tr>
                @endforeach 
                   </tbody>
                </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
