@extends('intranet.app')



@section('content')



<div class="">
    
{!!

 dd($editor)
!!}

</div>

@endsection

@section('scripts')

<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

@endsection


