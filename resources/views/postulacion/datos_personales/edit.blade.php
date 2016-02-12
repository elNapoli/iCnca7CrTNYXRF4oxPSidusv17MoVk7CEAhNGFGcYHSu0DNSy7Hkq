{!! Form::model($postulante, ['url'=>['postulacion/update'], 'method'=>'put','id'=>'form-postulacion-active']) !!}


@include('postulacion.datos_personales.fields')



{!!Form::close()!!}
