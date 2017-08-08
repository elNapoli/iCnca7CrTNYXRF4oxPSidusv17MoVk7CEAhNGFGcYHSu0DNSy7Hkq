@extends('intranet.app')



@section('content')
<div class="error-400">
<h1>{{ $exception->getStatusCode() }}</h1>
    <h2> {{trans('error.badRequest')}}</h2>
    <p>{{ $exception->getMessage() }}</p>
</div>
<style type="text/css">
	h2 {color: #D35780;margin: 0 10px;text-align: center;}
	p{
		text-align: center;
		font-size: 20px;
	}

.error-400{
	-webkit-box-shadow: 10px 10px 15px -15px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 15px -15px rgba(0,0,0,0.75);
box-shadow: 10px 10px 15px -15px rgba(0,0,0,0.75);
background: white;
padding: 10px 50px 20px 50px;

}
</style>
@endsection







