@extends('layout.app')

@section('Dashboard') Universidades @endsection

@section('content')

<div class="row">
      <!-- Default panel contents -->
    <div class="col-md-1" ></div>
    <div class="col-md-9" >

        <div class="panel panel-default">

            @include('partials.success')
          <div class="panel-heading"><a class="btn-info btn" href="{{ url('universidades/create') }}">Crear universidad</a></div>

          <!-- Table -->
            @include('universidades.partials.table')
        

        </div>
    </div>

</div>


@endsection

@section('breadcrumbs')
{!! Breadcrumbs::render('home') !!}
@endsection






