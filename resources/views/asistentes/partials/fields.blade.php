<div class="form-group">

<fieldset disabled>

    {!!  Form::label('nombre', ' Nombre asistente ');!!}
    {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Beca Bicentenario'));!!}

    {!!  Form::label('$post', ' Postulante ');!!}
    {!! Form::text('$post',null,array('class' => 'form-control','placeholder'=>$post->nombre.' '.$post->apellido_paterno.' '.$post->apellido_materno));!!}
</fieldset>


    {!!  Form::label('indicaciones', ' Indicaciones ');!!}
    {!! Form::textarea('indicaciones',null,array('class' => 'form-control','placeholder'=>'Ej: Beca Bicentenario', 'rows'=>'3'));!!}

    <button type="submit" class="btn btn-default">Editar</button>

    </div>  
<table id="tableDetalleBeneficio" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Beneficio</th>
                <th>Acción</th>

            </tr>
        </thead>
        <tfoot>

        <tbody>
	@foreach($detalle as  $item)
    <tr data-benef="{{ $item->beneficio }}" data-id="{{ $item->id_a }}">

		<td>{{$item->beneficioR->nombre}}</td>
		<td>
			<a href="" class="btn-delete">Del</a>
		</td>
	</tr>
	@endforeach	
       </tbody>
    </table>
	<br>
    <div class="form-group">
  	{!!  Form::label('beneficio', ' Agregar beneficio ')!!}
	{!!  Form::select('beneficio', [null=>'Seleccione un beneficio']+$beneficios,null,array('class' => 'form-control'))!!}

    <button id='add_b' type="button" class="btn btn-success btn-block">Agregar</button>

	</div>

    	<br>

