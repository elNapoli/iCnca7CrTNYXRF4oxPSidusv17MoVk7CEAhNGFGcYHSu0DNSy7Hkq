@extends('internet.app')


@section('content')

<div class="col-md-11">
<br>

<div class= "shape">SERVICIOS</div>

<button class="accordion">Sitios de interés</button>
<div class="panel2">
<br>

<ul style="list-style-type: disc; padding-left: 1em;">

<li><p align='justify'><a href="http://deportes.uach.cl/"><strong>Centro de deportes y recreación</strong></a></p></li> 
<li><p align='justify'><a href="http://dae.uach.cl/"><strong>Dirección de asuntos estudiantiles</strong></a></p></li> 
<li><p align='justify'><a href="http://humanidades.uach.cl/centro-de-idiomas/"><strong>Centro de idiomas</strong></a></p></li> 
<li><p align='justify'><a href="http://www.extension.uach.cl/"><strong>Dirección de vinculación con el medio</strong></a></p></li> 
<li><p align='justify'><a href="http://vinculacion.uach.cl/index.php/unidades-adscritas/conservatorio-de-musica"><strong>Conservatorio de música</strong></a></p></li> 
<li><p align='justify'><a href="http://dae.uach.cl/centro-salud/"><strong>Centro de salud</strong></a></p></li> 
<li><p align='justify'><a href="http://2017.cineclubuach.cl/"><strong>Cine club</strong></a></p></li> 
<li><p align='justify'><a href="https://dservicios.uach.cl/unidadesunidad-casino-central/"><strong>Casinos</strong></a></p></li> 
<li><p align='justify'><a href="http://www.uach.cl/direccion-de-tecnologias-de-informacion"><strong>DTI</strong></a></p></li> 
<li><p align='justify'><a href="http://www.biblioteca.uach.cl/"><strong>Bibliotecas</strong></a></p></li> 

</ul>
<br>
</div>

<br>

<div class= "shape">Mapas</div>

<button class="accordion">Valdivia</button>
<div class="panel2">
<iframe
  width="100%"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key= AIzaSyCTjP261aGUpeBiKHpXLsWV7WS5GM2tUx8&q=Valdivia+Chile" allowfullscreen>
</iframe>
</div>

<button class="accordion">Puerto Montt</button>
<div class="panel2">
<iframe
  width="100%"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key= AIzaSyCTjP261aGUpeBiKHpXLsWV7WS5GM2tUx8&q=Puerto+Montt+Chile" allowfullscreen>
</iframe>
</div>

<button class="accordion">Coyhaique</button>
<div class="panel2">
<iframe
  width="100%"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key= AIzaSyCTjP261aGUpeBiKHpXLsWV7WS5GM2tUx8&q=Coyhaique+Chile" allowfullscreen>
</iframe>
</div>

<button class="accordion">Osorno</button>
<div class="panel2">
<iframe
  width="100%"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key= AIzaSyCTjP261aGUpeBiKHpXLsWV7WS5GM2tUx8&q=Osorno+Chile" allowfullscreen>
</iframe>
</div>

</div>

@include('auth.modal_register')

@endsection

<style type="text/css">

.shape{
  text-align:center;
  background-color:rgba(102, 102, 102, 1);
  width:200px;
  height:40px;
  line-height:40px;
  color:white;
  margin-bottom:20px;
  position:relative;
}
.shape:before{
  content:"";
  width:0px;
  height:0px;
  border-top:40px solid rgba(102, 102, 102, 1);
  border-right:40px solid transparent;
  position:absolute;
  left:100%;
  top:0px;
}

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

.alert2 {
    font-size: 12px;
    font-family: sans-serif;
    padding: 12px 10px 10px;
    background-color: #ff9800; /* Red */
    color: white;
    margin-bottom: 20px;
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
