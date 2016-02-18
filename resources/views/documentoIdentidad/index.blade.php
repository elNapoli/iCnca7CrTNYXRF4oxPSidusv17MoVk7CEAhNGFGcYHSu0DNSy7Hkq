@extends('layout.app')

@section('Dashboard') Departamentos @endsection

@section('content')

<a href="#!" id="agregar" class="btn btn-primary">hola </a>
    <div id="wizard">
        <h1>First Step</h1>
        <div>First Content</div>
     
        <h1>Second Step</h1>
        <div>Second Content</div>
    </div>




        <div id="perro">perro malo </div>

@endsection
@section('styles')
    {!! Html::Style('plugins/jquery-steps/css/jquery.steps.css')!!}
    {!! Html::Style('plugins/bootstrap/css/bootstrap-select.css')!!}



@endsection


@section('scripts')
    {!! Html::Script('plugins/jquery-steps/js/jquery.steps.js')!!}

  <script type="text/javascript">


    $(document).on('ready',function(){


          // Initialize wizard
    var wizard = $("#wizard").steps();
     
    $('#agregar').on('click',function(){

wizard.steps("add", {
    title: "HTML code", 
    contentMode: "async",
    contentUrl: "{{url('postulacion/create-or-edit')}}"
});

    })

    });
  </script>
@endsection