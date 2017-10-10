@extends('internet.app')


@section('content')

<div class="col-md-11">
<br>

<button class="accordion">Alumnos UACh</button>
<div class="panel2">
<br>
<p align='justify'>Si eres alumno regular de una carrera de Pregrado o Postgrado de la Universidad Austral de Chile, te invitamos a no perder de vista esta oportunidad de intercambio. Infórmate de cuáles son los  procedimientos, fechas de postulación, las posibilidades de becas y toda  la información necesaria para que puedas postular a un semestre o un año en alguna universidad del país o  del extranjero. “Vívelo, que  no te lo cuenten” ¡Infórmate y postula!</p>
<br>
</div>


<button class="accordion">Procesos y guía de postulación</button>
<div class="panel2">
<br>
<p align='justify'>La postulación a un Programa de Intercambio Académico es un proceso que conlleva muchas etapas antes de postular, es importante que te informes de todos los requisitos y  procedimientos para acceder a un intercambio estudiantil.  Es por esto que te recomendamos seguir la planeación siguiente.</p>
<br>
</div>

<button class="accordion">Planeación</button>
<div class="panel2">
<br>
<ul style="list-style-type: disc; padding-left: 1em;">

<li><p align='justify'>Planificar por lo menos con un año de anticipación la postulación. Es importante que tomes una buena decisión de cuándo es el mejor momento  para realizar el intercambio.</p></li>

<li><p align='justify'>¿Qué tipo de intercambio vas a realizar?
<a id='link' href="#!" data-toggle="popover" data-trigger="hover" ><strong>Modalidades</strong></a>
</p></li>

<li><p align='justify'>¿Qué pasa con los beneficios estatales, qué trámites debes realizar antes de tu partida para no perder los beneficios?</p></li>

<li><p align='justify'>Considerar que debes tener aprobado los dos primeros años de carrera y cuándo postules no debes tener asignaturas reprobadas el semestre anterior a tu postulación</p></li>

<li><p align='justify'><strong>Planifica tu malla:</strong> Si ya decidiste la modalidad de intercambio a la que te gustaría postular, es el momento para revisar tu malla académica y avance curricular, para así planificar de la mejor manera el semestre en el cual te irás de intercambio. Una opción recomendable es tomar contacto con tu dirección de Escuela para comenzar a hablar desde ya sobre la <a id='link' href="#!" data-toggle="popover2" data-trigger="hover" ><strong>convalidación de ramos</strong></a> que depende exclusivamente de cada Escuela.  Deberás revisar las páginas web de cada institución para así informarte sobre los cursos disponibles para el periodo académico específico que cursarás. </p></li>

<li><p align='justify'><strong>Idioma:</strong> Hay muchas universidades en donde la lengua en que se imparten las clases no es el español. En estos casos debes contar con el nivel que cada universidad requiera, al momento de postular. En caso de que te interese una universidad con <a id='link' href="#!" data-toggle="popover3" data-trigger="hover" ><strong>requisito de idioma</strong></a>, no podrás postular sin presentar tu certificado correspondiente. La UACh te ofrece a través del Centro de Idiomas, cursos  que te pueden interesar.</p></li>

<li><p align='justify'><strong>Postulación a universidad extranjera:</strong>  El proceso de postulación y tiempo de respuesta puede variar enormemente de una universidad a otra. Cada alumno postula a una universidad, a la cual deberá enviar la documentación correspondiente según le indique la OME. En promedio las aceptaciones toman alrededor de 6 semanas en llegar.
En esta etapa, el alumno deberá también informarse acerca de las pautas de convalidación de cursos de su unidad académica y, si corresponde, comenzar a gestionar los procesos internos.</p>

<p id='indent' align='justify'> Cuando hayas  obtenido la carta de aceptación de la universidad de destino, podrás comenzar a realizar los <a id='link' href="#!" data-toggle="popover4" data-trigger="hover" ><strong>trámites internos</strong></a>, exigidos por la OME antes de tu partida. Es responsabilidad de cada alumno tramitar la VISA de estudiante en el Consulado correspondiente, reservar alojamiento y comprar los pasajes para su Intercambio Académico.</p>

<p id='indent' align='justify'>Durante la estadía del alumno en la universidad de destino, la OME seguirá siendo el punto principal de contacto con la UACh y apoyo en caso de problemas y dudas con su intercambio. Sin embargo, el alumno deberá estar atento a los procesos internos e información enviada por la OME,  su unidad académica u otras unidades de la UACh (inscripción de cursos, renovación de beneficios socioeconómicos, etc.).  Además el estudiante deberá mantener su calidad de alumno regular, mientras se encuentre de intercambio, de lo contrario <strong>no</strong> se reconocerá la actividad académica que haya realizado en el universidad de destino.</p></li>

<li><p align='justify'><strong>Finalización del intercambio o extensión y retorno a la UACh:</strong>
Al finalizar tu intercambio, te recomendamos confirmar con tu universidad de destino el proceso requerido para el envío a la OME de tu certificado de notas. Una vez que la OME reciba el certificado oficial del intercambio, lo hará  llegar a la respectiva Escuela para que se proceda al proceso de convalidación.</p><p id='indent' align='justify'>La duración máxima que puedes estar en un intercambio académico es de un año. Puedes solicitar extensión de tu intercambio estando en el extranjero, pero debes ponerte en contacto con la OME para formalizar o solicitar tu extensión de acuerdo a los procedimientos y plazos estipulados.</p></li>
</ul>
<br>
</div>

<button class="accordion">Requisitos</button>
<div class="panel2">
<br>
<ul style="list-style-type: disc; padding-left: 1em;">
<li>Tener matrícula vigente al momento de postular.</li>
<li>Haber aprobado los dos primeros años de carrera completamente.</li>
<li>No haber reprobado asignaturas el semestre anterior a la postulación.</li>
<li>Poseer el nivel de idioma requerido por la universidad de destino.</li>
<li>Demostrar solvencia económica para realizar el intercambio (becas u otros ingresos).</li>
<li>No haber transgredido el reglamento estudiantil de la Universidad Austral de Chile.</li>
</ul>
<br>
<p id='indent'>Si has tomado la decisión y cumples con los requisitos, haz click <a class="link" href="#!" id="open_modal_register"><strong>aqui</strong></a> para ir al registro de postulantes.</p>
</div>
</div>

@include('auth.modal_register')

@endsection

<style type="text/css">

/*#solido {

    border-top: 1px solid black;
    border-bottom: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    padding-bottom: 20px;


}*/

#indent{
    text-indent:30px;
}

#sect{
	font-size:22px;
	font-family: sans-serif;
	box-sizing: border-box;
    background-color: #d6d6d6;
    color: #666;
    display: inline-block;
    padding: 5px 30px;
    display: block;

}

#lat-derecho {
    background-color: #d6d6d6;
    color: #666;
    font-size: 12px;
    margin-top: 0px;
    margin-bottom: 20px;
    padding: 10px 15px;
    width: 190px;
}

#link{
	color:#ab0034;
}


 /* Style the buttons that are used to open and close the accordion panel */
button.accordion {
    font-size: 22px;
    font-family: sans-serif;
    background-color: #d6d6d6;
    padding: 5px 30px;
    color: #666;
    cursor: pointer;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
button.accordion.active, button.accordion:hover {
    background-color: #666;
    color: white;

}

/* Style the accordion panel. Note: hidden by default */
div.panel2 {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
    margin-bottom: 5px;
}

button.accordion:after {
    content: '\02795'; /* Unicode character for "plus" sign (+) */
    font-size: 13px;
    color: white;
    float: right;
    padding: 5px;

}

button.accordion.active:after {
    content: "\2796"; /* Unicode character for "minus" sign (-) */
    color: white;
}

</style>

@section('scripts')
    <script>
    $(document).ready(function(){

$('#open_modal_register').on('click',function(){

                $('#modal_register').modal('show');
            });

            $('#registrarse').on('click',function(){

                $.ajax({
                                  
                    async : false,
                    data:$('#form-register').serialize(),
                    //Cambiar a type: POST si necesario
                    type: 'POST',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url:$('#form-register').attr('action') ,
                    beforeSend:function() {
                        $('#loading').show();
                    },
                    complete: function(){
                        $('#loading').hide();
                    },
                    success : function(json) {           
                        $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
                            $('#modal_register').modal('hide'); 
                    },

                    error : function(xhr, status) {
                        var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
                            for(var key in xhr.responseJSON)
                            {
                                html += "<li>" + xhr.responseJSON[key][0] + "</li>";
                            }
                            $('.message_modal').html(html+'</div>');
                  
                    },
                    


                });
            });
      
    $('[data-toggle="popover"]').popover({title: "<p><strong>Modalidades</strong> </p>", content: "<p><strong>A: </strong>Intercambio por un semestre hasta un año.</p><p><strong>B: </strong>Doble licenciatura o titulación</p><p><strong>C: </strong>Prácticas.</p><p><strong>D: </strong>Estadías cortas de investigación.</p>", html: true, placement: "top",container: 'body'}).on("show.bs.popover", function() {
    return $(this).data("bs.popover").tip().css({
      maxWidth: "400px",
      padding: "0px"
    });
  });

    $('[data-toggle="popover2"]').popover({content: "<p>El proceso de convalidación de ramos se realiza una vez que termines el semestre de intercambio y vuelvas a la UACh, siempre que hayas realizado antes del intercambio los trámites de pre convalidación correspondientes que tu Unidad Académica pudiera exigir. Para llevarlo a cabo, debes contar con tu certificado de notas del intercambio que tu universidad de destino enviará a la oficina de Movilidad Estudiantil.  Cada Unidad Académica realiza las convalidaciones de los cursos que aprobaste, por lo que cualquier duda que te surja, debes dirigirte directamente a tu Escuela.</p>", html: true, placement: "top",container: 'body'}).on("show.bs.popover", function() {
    return $(this).data("bs.popover").tip().css({
      maxWidth: "400px",
      padding: "0px"
    });
  });

    $('[data-toggle="popover3"]').popover({content: "<p>Debes tener en cuenta que conseguir un nivel determinado de idioma puede tomar bastante tiempo, por lo que es importante que planifiques tomar los cursos necesarios con la anticipación correspondiente y así tener el certificado de idioma que necesitas al momento de iniciar tu postulación. Cada universidad tiene requisitos distintos de idioma y acepta distintas pruebas o acreditaciones. </p>", html: true, placement: "top",container: 'body'}).on("show.bs.popover", function() {
    return $(this).data("bs.popover").tip().css({
      maxWidth: "400px",
      padding: "0px"
    });
  });

    $('[data-toggle="popover4"]').popover({content: "<p>Debes completar los siguientes formularios y  entregarlos a la OME:<hr><strong>1: </strong>Acuerdo de Homologación.</p><p><strong>2: </strong>Formulario de antecedentes y compromisos.</p><strong>3: </strong>Mantención de Beneficios.</p>", html: true, placement: "top",container: 'body'}).on("show.bs.popover", function() {
    return $(this).data("bs.popover").tip().css({
      maxWidth: "400px",
      padding: "0px"
    });
  });

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].onclick = function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      }
    }

});
    </script>
@endsection
