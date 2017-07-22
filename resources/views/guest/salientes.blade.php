@extends('internet.app')


@section('content')


<br>
<h3>ALUMNOS UACh</h3>
<br>
<p>Si eres alumno regular de una carrera de Pregrado o Postgrado de la Universidad Austral de Chile, te invitamos a no perder de vista esta oportunidad de intercambio. Infórmate de cuáles son los  procedimientos, fechas de postulación, las posibilidades de becas y toda  la información necesaria para que puedas postular a un semestre o un año en alguna universidad del país o  del extranjero. “Vívelo, que  no te lo cuenten” ¡Infórmate y postula!</p>
<br>
<h3>PROCESOS Y GUÍA DE POSTULACIÓN</h3>
<p>La postulación a un Programa de Intercambio Académico es un proceso que conlleva muchas etapas antes de postular, es importante que te informes de todos los requisitos y  procedimientos para acceder a un intercambio estudiantil.  Es por esto que te recomendamos :</p>
<br>
<h3>PLANEACIÓN</h3>
<li> 1. Planificar por lo menos con un año de anticipación la postulación. Es importante que tomes una buena decisión de cuándo es el mejor momento  para realizar el intercambio.</li>
<li>2. ¿Qué tipo de intercambio vas a realizar?

<a href="#" data-toggle="popover" data-trigger="hover" >Modalidades</a>

</li>
<li>3. ¿Qué pasa con los beneficios estatales, qué trámites debes realizar antes de tu partida para no perder los beneficios?</li>



@endsection

@section('scripts')
    <script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover({title: "<p><strong>Modalidades</strong> </p>", content: "<p>Modalidad A : Intercambio por un semestre hasta un año.<br>Modalidad B: Doble licenciatura o titulación<br>Modalidad C: Prácticas<br>Modalidad D: Estadías cortas de investigación </p>", html: true, placement: "top",container: ''}); 
});
    </script>
@endsection