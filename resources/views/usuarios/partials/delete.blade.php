{!! Form::open(['route'=>['admin.usuarios.destroy',$user->id], 'method'=>'DELETE']) !!}

<button  tye="submit" onClick="return confirm('Esta seguro de eliminar el registro?')" class="btn-danger btn"> Eliminar</button>
{!! Form::close()!!}