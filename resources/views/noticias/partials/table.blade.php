<div class="row mt">
    <div class="col-lg-12">
        <div class="panel-body">
            <table id="tableNoticias" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="250">Fotografia</th>
                        <th>Información</th>
                        <th>Mostrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noticias as $item)
                    <tr>
                        @if($item->foto == 'path' or $item->foto == '')
                            <td><img src="http://cdn.abclocal.go.com/content/kfsn/images/cms/26184_1280x720.jpg" alt="..." height="200" width="300" hspace="0"></td>
                        @else
                            <td><img src="{{$item->foto}}" alt="..." height="200" width="300" hspace="0"></td>
                        @endif
                        <td> 
                        <div class="caption">
                            <br>
                            <p>Creado por : {{$item->usuarioR->name}}</p>
                            <h3>{{$item->titulo}}</h3>
                            <p>{{$item->resumen}}</p>
                        <p><a href="noticias/edit/{{$item->id}}" class="btn btn-info" id="{{$item->id}}" role="button">Editar</a> <a href="#" class="btn btn-danger btn-delete" id="{{$item->id}}" role="button">Eliminar</a></p>
                        </div>
                        </td>
                        <td style= 'vertical-align:middle'>
                            <div style= 'text-align:center'>
                                    @if($item->carousel == 'si')
                                        <input type="checkbox" class="micheck" checked id="{{$item->id}}"> 
                                    @else
                                        <input type="checkbox" class="micheck" id="{{$item->id}}">
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->