

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

    {!!Form::hidden('getURL', route('ciudades.getPais'),array('id'=>'getURL'));!!}
    {!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}

</div>








@section('scripts')
 <script type="text/javascript">
  $(document).ready(function(){

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