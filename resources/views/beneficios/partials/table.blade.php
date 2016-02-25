<div class="row mt">
    <div class="col-lg-8">
        <div class="content-panel">
            <table id="tableBeneficio" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                             <th>#</th>
                            <th>Nombre</th>
                            <th>Acción</th>

                        </tr>
                    </thead>
                    <tbody>
                @foreach($beneficios as  $item)
                <tr data-id="{{ $item->id }}">

                    <td><a href="{{ url('beneficios/edit', $item->id)}}">{{$item->id}}</a></td>
                    <td>{{$item->nombre}}</td>
                    <td align="center">
                        <a href="{{ url('beneficios/edit', $item->id)}}" class="model-open-edit btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="" class="btn btn-danger btn-delete btn-xs"><i class="fa fa-trash-o "></i></a>
                    </td>
                </tr>
                @endforeach 
                   </tbody>
                </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->