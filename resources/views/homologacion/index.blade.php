@extends('layout.app')

@section('Dashboard') Cursos Homologados @endsection

@section('content')

<div class="row">
      <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-10" >

        <div class="panel panel-default">

            <div class="panel-heading"></div>

            <div class="panel-body">
                    
{!! Form::model($parametros, ['url'=>['declaracion/update'], 'method'=>'put','id'=>'form-postulacion-active']) !!}




                @include('homologacion.partials.fields')

{!!Form::close()!!}

                
            


    
                <!-- Table -->
                <div class="message"></div>
                @include('homologacion.partials.table')
    
            </div>
    

        </div>
    </div>

</div>
{!! Form::open(['url'=>['continentes/destroy',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}

{!! Form::close()!!}
    {!!Form::hidden('urlPaisDestroy', url('paises/destroy'),array('id'=>'urlPaisDestroy'));!!}



@endsection

@section('scripts')


    <script>    


    $(document).ready(function() {
        $('#tableCursosHomologados').DataTable({
 "searching": false,

            "paging":   false,
       
        "info":     false
        });
    } );
    </script>
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('paises') !!}
@endsection

