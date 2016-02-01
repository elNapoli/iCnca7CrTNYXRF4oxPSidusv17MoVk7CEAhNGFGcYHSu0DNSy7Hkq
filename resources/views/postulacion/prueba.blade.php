@extends('layout.app')

@section('Dashboard') Postulación @endsection

@section('content')
                {!!  Form::select('pais', 
            					[null=>'Seleccione un país'],null,
            					array('class' => 'pais form-control'))!!}
 



       <select class="form-control">
          <option>Seleccione </option>
        <optgroup label="Picnic">
          <option>Ketchup</option>
          <option>Relish</option>
        </optgroup>
        <optgroup label="Camping">
          <option>Tent</option>
          <option>Flashlight</option>
          <option>Toilet Paper</option>
        </optgroup>
      </select>




    <label for="files">Select a file</label>
    <select name="files" id="files" class="form-control">
      <optgroup label="Scripts">
        <option value="jquery">jQuery.js</option>
        <option value="jqueryui">ui.jQuery.js</option>
      </optgroup>
      <optgroup label="Other files">
        <option value="somefile">Some unknown file</option>
        <option value="someotherfile">Some other file with a very long option text</option>
      </optgroup>
    </select>

@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection


@section('scripts')
    {!! Html::Script('plugins/bootstrap/js/bootstrap-datepicker.js')!!}
    <script type="text/javascript">

		$(document).ready(function() {
$( "#files" ).selectmenu();
		
		});

    </script>
@endsection


@section('styles')


@endsection
