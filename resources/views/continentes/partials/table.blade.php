<div class="row mt">
    <div class="col-lg-8">
        <div class="content-panel">
            <table id="tableContinente" class="table table-striped table-bordered table-hover">
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal_crear_continente" href="#!">Crear continente</a>
                              <hr>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($continentes as  $item)
                        <tr data-id="{{ $item->id }}">

                            <td><a href="#!" class='model-open-edit' id="{{ $item->id }}" >{{$item->id}}</a></td>
                            <td>{{$item->nombre}}</td>
                           
                            <td  align="center">
                                  <a class="model-open-edit btn btn-primary btn-xs" id="{{ $item->id }}"><i class="fa fa-pencil"></i></a>
                                  <a class="btn btn-danger btn-delete btn-xs" id="{{ $item->id }}"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
