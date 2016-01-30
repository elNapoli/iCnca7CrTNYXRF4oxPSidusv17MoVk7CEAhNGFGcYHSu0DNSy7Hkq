@extends('layout.app')

@section('Dashboard') Universidad @endsection

@section('content')


                      
                          
   

<div class="col-md-1" ></div>
    <div class="col-md-7" >

		@include('partials.errorAjax')

		{!! Form::open(['url'=>'universidades/store', 'method'=>'POST','id'=>'form-save'])!!}
		
		@include('universidades.partials.tabs')

		<a href="#!" id="add_universidad" class="btn btn-default">Guardar</a>
		{!!Form::close()!!}
	</div>
        {!!Form::hidden('urlUniversidadIndex',url('universidades'),array('id'=>'urlUniversidadIndex'));!!}


@endsection




@section('scripts')
 <script type="text/javascript">
  $(document).ready(function(){

        $('.alert').hide();
        

        
        $('#continente').on('change',function(e){
        e.preventDefault();
        getListForSelect($('#getUrlPaisContinente').val(), $('#getToken').val(), $("#continente").val(), 'pais');    
        });


        
        $('#pais').on('change',function(e){
        e.preventDefault();

        getListForSelect($('#getUrCiudadContinente').val(), $('#getToken').val(), $("#pais").val(), 'ciudad');    
        });
        $('#add_universidad').on('click', function(e){

            var form = $('#form-save');
            var data = form.serialize();
            var url = form.attr('action');
            var html = "";
              $.ajax({
                  // En data puedes utilizar un objeto JSON, un array o un query string
                 data: data,

                 
                  //Cambiar a type: POST si necesario
                  type: "post",
                  // Formato de datos que se espera en la respuesta
                  dataType: "json",
                  // URL a la que se enviará la solicitud Ajax
                  url:url ,
                  success : function(json) {   
                    $(".alert-success").html("El registro fue guardado exitosamente").show();
                    $(".alert-danger").hide();

                    window.location.href = $('#urlUniversidadIndex').val();

                },

                  error : function(xhr, status) {
                    html += "<p> Porfavor corregir los siguientes errores </p>";
                    for(var key in xhr.responseJSON)
                    {
                        html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                    }
                    $(".alert-success").hide()
                    $(".alert-danger").html(html).show();
                  },
              });  


        });

  

  });

 </script>
@endsection



