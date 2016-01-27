

<div class="tab-pane fade in active" id="casaCentral">


    <div class="form-group">

        {!!  Form::label('nombre', ' Nombre del campus ');!!}
        {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Isla Teja'));!!}
    </div>  
    <div class="form-group">

        {!!  Form::label('telefono', ' Ń° Telefónico ');!!}
        {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej:+560632222222'));!!}
    </div>  
    <div class="form-group">

        {!!  Form::label('fax', ' Nombre N° fax ');!!}
        {!! Form::text('fax',null,array('class' => 'form-control','placeholder'=>'Ej: +560632222222'));!!}
    </div>  
    <div class="form-group">

        {!!  Form::label('sitio_web', ' sitio web del campus ');!!}
        {!! Form::text('sitio_web',null,array('class' => 'form-control','placeholder'=>'Ej: www.uach.cl'));!!}
    </div>  

    <div class="form-group">
        {!!  Form::label('ciudad', ' Nombre de la ciudad ')!!}
        {!!  Form::select('ciudad', [null=>'Seleccione ciudad'],null,array('class' => 'form-control miCiudad'))!!}
    </div>
    @if(isset($infoUniversidad))
    {!!Form::hidden('infoUniversidad', $infoUniversidad,array('id'=>'infoUniversidad'));!!}



    @endif
    {!!Form::hidden('getURL', url('ciudades/pais-by-continente'),array('id'=>'getURL'));!!}
    {!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}

</div>



@section('scripts')
 <script type="text/javascript">
  $(document).ready(function(){

    var objUniversidad = JSON.parse($('#infoUniversidad').val())[0];
    var objCampus = objUniversidad.campus_sedes;
    var numCampus = objCampus.length;
    console.log(objCampus);

        $.each( objCampus, function ( index, obj) {
            var nextTab = $('#tabs li').size()+1;
            console.log(obj.nombre)
            // create the tab
            $('<li><a class = "tabClick" href="#tab-'+obj.id+'" data-toggle="tab">Campus: '+obj.nombre+'</a></li>').appendTo('#tabs');

    
            var content = '<div class="tab-pane" id="tab-'+obj.id+'">';
            var input = ' <div class="form-group">'+
                    '<label for="nombre"> Nombre del campus '+obj.id+'</label>'+
                    '<input class="form-control" placeholder="Ej: Isla Teja" name="nombre" type="text" id="nombre">'+

                '</div>';
            // create the tab content

            for (i = 0; i < 4; i++) {
              content = content+ input;
            }
            content = content+' content</div>';


            $(content).appendTo('.tab-content');
            
            // make the new tab active


        });
            $('#tabs a:last').tab('show');
        $('#btnAdd').click(function (e) {
            var nextTab = $('#tabs li').size()+1;
          
            // create the tab
            $('<li><a href="#tab'+nextTab+'" data-toggle="tab">Campus '+nextTab+'</a></li>').appendTo('#tabs');
            
            // create the tab content
            $('<div class="tab-pane" id="tab'+nextTab+'">tab' +nextTab+' content</div>').appendTo('.tab-content');
            
            // make the new tab active
            $('#tabs a:last').tab('show');
        });

        
        $('#continente').on('change',function(e){
        e.preventDefault();
        getListForSelect($('#getURL').val(), $('#getToken').val(), $("#continente").val(), 'pais');    
        });


        
        $('#pais').on('change',function(e){
        e.preventDefault();
        getListForSelect($('#getURL').val(), $('#getToken').val(), $("#pais").val(), 'ciudad','miCiudad');    
        });
  });

 </script>
@endsection