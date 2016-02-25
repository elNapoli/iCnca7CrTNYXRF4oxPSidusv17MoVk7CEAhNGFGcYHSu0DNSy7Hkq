@extends('layout.app')
@section('content')
<table id="tableAsistente" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                 <th>#</th>
                <th>Asistente</th>
                <th>Postulante</th>
                <th>Beneficio</th>
                <th>Observacion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Asistente</th>
                <th>Postulante</th>
                <th>Beneficio</th>
                <th>Observacion</th>                
                <th>Accion</th>
            </tr>
        </tfoot>
    </table>
@endsection


<!--
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#tableAsistente').DataTable( {
        "ajax": "/json.txt",
        "columns": [
            { "data": "id" },
            { "data": "pregrados_r.pre_uachs_r.asistentes_r.nombre" },
            { "data": "apellido_paterno" },
            { "data": "apellido_materno" },
            { "data": "pregrados_r.pre_uachs_r.asistentes_r.detalle_beneficio_r[0].beneficio_r[0].id" },
            { "data": "nacionalidad" }
        ]
    } );
} );
</script>
@endsection

-->