{!! Form::model($parametros, ['url'=>['estudo-actual/update'], 'method'=>'put','id'=>'form-postulacion-active']) !!}


@include('postulacion.estudio_actual.fields')



{!!Form::close()!!}