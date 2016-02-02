<div class="form-group">

<fieldset disabled>
    {!!  Form::label('nombre', ' Nombre asistente ');!!}
    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Beca Bicentenario'));!!}

    {!!  Form::label('$post', ' Postulante ');!!}
    {!! Form::text('$post',null,array('class' => 'form-control','placeholder'=>$post->nombre.' '.$post->apellido_paterno.' '.$post->apellido_materno));!!}
</fieldset>


    {!!  Form::label('indicaciones', ' Indicaciones ');!!}
    {!! Form::textarea('indicaciones',null,array('class' => 'form-control','placeholder'=>'Ej: Beca Bicentenario', 'rows'=>'3'));!!}

    </div>  
<table id="tableDtealleBeneficio" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>

                <th>Beneficio</th>
                <th>Acción</th>

            </tr>
        </thead>
        <tfoot>

        <tbody>
	@foreach($detalle as  $item)
	<tr data-id="{{ $item->id_a }}">


		<td>{{$item->beneficioR->nombre}}</td>
		<td>
			<a href="" class="benef btn-delete">Del</a>
		</td>
	</tr>
	@endforeach	
       </tbody>
    </table>
	<br>
    <div class="form-group">
  	{!!  Form::label('beneficio', ' Agregar beneficio ')!!}
	{!!  Form::select('beneficio', [null=>'Seleccione un beneficio']+$beneficios,null,array('class' => 'form-control'))!!}
	</div>

    	<br>

