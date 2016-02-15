@extends('layout.app')

@section('Dashboard') Carreras @endsection

@section('content')
<p>Date: <input type="text" id="datepicker" disabled></p>




@endsection



@section('scripts')
    {!! Html::Script('js/datepicker-es.js')!!}


  <script>

  $(function() {
    $( "#datepicker" ).datepicker({

    	showButtonPanel: true,
      	changeMonth: true,
      	changeYear: true,
      	dateFormat: 'yy-mm-dd',
      	showAnim: 'drop',
  	 	showOn: "button",
  	 	buttonImage: "img/calendar.gif",
       	buttonImageOnly: true,
      	buttonText: "Seleccione fecha"
    });
  });
  </script>
@endsection

