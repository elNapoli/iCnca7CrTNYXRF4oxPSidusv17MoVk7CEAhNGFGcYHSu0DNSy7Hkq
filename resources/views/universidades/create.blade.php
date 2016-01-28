@extends('layout.app')

@section('Dashboard') Universidad @endsection

@section('content')


                      
                          
   

<div class="col-md-1" ></div>
    <div class="col-md-7" >

		@include('partials.error')

		{!! Form::open(['url'=>'universidades/store', 'method'=>'POST'])!!}
		
		@include('universidades.partials.tabs')

		<button type="submit" class="btn btn-default">Guardar</button>
		{!!Form::close()!!}
	</div>


@endsection




@section('scripts')
 <script type="text/javascript">
  $(document).ready(function(){

        

        
        $('#continente').on('change',function(e){
        e.preventDefault();
        getListForSelect($('#getUrlPaisContinente').val(), $('#getToken').val(), $("#continente").val(), 'pais');    
        });


        
        $('#pais').on('change',function(e){
        e.preventDefault();

        getListForSelect($('#getUrCiudadContinente').val(), $('#getToken').val(), $("#pais").val(), 'ciudad');    
        });

  

  });

 </script>
@endsection



