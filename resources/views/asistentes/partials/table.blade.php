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
        <tbody>
    @foreach($asistentes as  $item)
    <tr data-id="{{ $item->id }}">

        <td>{{$item->id}}</td>
        <td>{{$item->nombre}}</td>
        <td>{{$item->postulante}}</td>
        <td>{{$item->beneficioR->nombre}}</td>
        <td>{{$item->indicaciones}}</td>
        <td>
            <a href="{{ url('asistentes/edit', $item->id)}}">Edit</a>
            <a href="" class="btn-delete">Del</a>
        </td>
    </tr>
    @endforeach 
       </tbody>
    </table>