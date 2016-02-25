{!! Form::model($parametros, ['url'=>['prepostulacionuniversidad/update'], 'method'=>'put','id'=>'form-postulacion-active']) !!}

@include('postulacion.postulacion_universidad.fields')

{!!Form::close()!!}