<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <table id="tableContinente" class="table table-striped table-bordered table-hover">
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
                <td  align="center">
                    <a href="{{ route('admin.usuarios.edit', $item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-delete btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
            </tr>
            @endforeach 
               </tbody>
            </table>

        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
