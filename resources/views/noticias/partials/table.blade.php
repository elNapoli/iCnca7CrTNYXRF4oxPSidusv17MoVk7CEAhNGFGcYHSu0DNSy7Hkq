<div class="row mt">
    <div class="col-lg-12">
        <div class="panel-body">
            <table id="tableNoticias" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="250">Fotografia</th>
                        <th>Información</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noticias as $item)
                    <tr>
                        <td><img src="http://cdn.abclocal.go.com/content/kfsn/images/cms/26184_1280x720.jpg" alt="..." height="200" width="300" hspace="0"></td>
                        <td> 
                        <div class="caption">
                            <br>
                            <p>Creado por : {{$item->usuarioR->name}}</p>
                            <h3>{{$item->titulo}}</h3>
                            <p>{{$item->resumen}}</p>
                        <p><a href="#" class="btn btn-info" role="button">Editar</a> <a href="#" class="btn btn-danger btn-delete" id="{{$item->id}}" role="button">Eliminar</a></p>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->