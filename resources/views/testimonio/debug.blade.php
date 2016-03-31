@extends('intranet.app')



@section('content')



<div class="">
    
{!!

 html_entity_decode($editor)
!!}

</div>

@endsection

@section('scripts')

<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

@endsection


