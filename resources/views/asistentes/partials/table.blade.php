<table id="tableAsistente" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                 <th>#</th>
                <th>Asistente</th>
                <th>Postulante</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Asistente</th>
                <th>Postulante</th>              
                <th>Accion</th>
            </tr>
        </tfoot>
        <tbody>
    @foreach($asistentes as  $item)
    <tr data-id="{{ $item->pregradosR->preUachsR->asistentesR->id}}">

        <td>{{$item->pregradosR->preUachsR->asistentesR->id}}</td>
        <td>{{$item->pregradosR->preUachsR->asistentesR->nombre}}</td>
        <td>{{$item->nombre.' '.$item->apellido_paterno.' '.$item->apellido_materno}}</td>
                <td>
            <a href="{{ url('asistentes/edit', $item->pregradosR->preUachsR->asistentesR->id)}}">Edit</a>
            <a href="" class="btn-delete">Del</a>
        </td>
    
<!--
        <tr>

            <td colspan="5"><h4>Beneficios</h4>


                            @foreach($item->pregradosR->preUachsR->asistentesR->detalleBeneficioR as $ben)
                                {{'- '.$ben->beneficioR->nombre}}
                                <br>
                            @endforeach
            </td>
        </tr>
        <tr>

            <td colspan="5"><h4>Indicaciones</h4>
                            {{$item->pregradosR->preUachsR->asistentesR->indicaciones}}
            </td>




            </tr> -->

    @endforeach 
       </tbody>
    </table>