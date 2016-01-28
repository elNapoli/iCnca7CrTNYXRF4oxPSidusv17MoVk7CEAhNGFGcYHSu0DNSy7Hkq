    {!! Form::open(['url'=>['universidades/destroy',$idUniversidad], 'method'=>'DELETE']) !!}
      <button  tye="submit" onClick="return confirm('Esta seguro de eliminar el registro?')" class="btn-danger btn"> Eliminar Universidad</button>
    {!! Form::close()!!}