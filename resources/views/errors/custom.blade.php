@extends('intranet.app')



@section('content')
        <style>
            h1 {margin: 0 10px; font-size: 50px; text-align: center;}
            h1 span {color: #bbb;}
            h2 {color: #D35780;margin: 0 10px;font-size: 40px;text-align: center;}
            h2 span {color: #bbb;font-size: 80px;}
            h3 {margin: 1.5em 0 0.5em;}
            p {margin: 1em 0;}
            ul {padding: 0 0 0 40px;margin: 1em 0;}
            .container {max-width: 380px;_width: 480px;margin: 0 auto;}
            input::-moz-focus-inner {padding: 0;border: 0;}
        </style>
    </head>
        <div class="container">

            <h2><span>500</span>Error interno del servidor</h2>
            <p>{{ $message}}</p>
        </div>
@endsection







