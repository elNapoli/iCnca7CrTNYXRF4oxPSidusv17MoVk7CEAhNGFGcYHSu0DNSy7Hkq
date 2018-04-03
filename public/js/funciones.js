function selectByTabs(ruta_input,idSelect,token_prueba,url,idSelectDestino){
    //idTab: Selector padre(ej:div)- idSelect: Elemento en cuestion(Ej: pais)
var idTab = $(ruta_input);
var idSelect = idSelect;
//var idSelectDestino = '#'+idSelectDestino;
              //Ruta: es esa mierda que hay que buscar entre los selectores <div>
idTab.on('change',idSelect,function(e){  

var ruta = $(ruta_input+' select'+idSelectDestino); //idSelectDestino: es el id del objeto donde se carga la respuesta ajax
var token = $(token_prueba).val();
//alert($('div#wizard input#getToken').val());
var urlE = $(url).val();
$.ajax({
    // En data puedes utilizar un objeto JSON, un array o un query string
   data: {
        "_token": token,
        "idBuscar": $(this).val(),
    },
    //Cambiar a type: POST si necesario
    type: "post",
    async : false,
    // Formato de datos que se espera en la respuesta
    dataType: "json",
    // URL a la que se enviará la solicitud Ajax
    url:urlE ,
    beforeSend:function() {
        $('#loading').show();
    },
    complete: function(){
        $('#loading').hide();
    },
    success : function(json) {
        ruta.empty();
        ruta.append("<option value='0'>Seleccione la "+idSelectDestino+"</option>");

        if(url ==="#getCampusByPais"){
            $.each(json, function(index, subCatObj){
            ruta.append(" <optgroup label='"+subCatObj.nombre+"'>");
                

                $.each(subCatObj.campus_sedes_r, function(index2, subCatObj2){

                    ruta.append("<option value="+subCatObj2.id+">"+subCatObj2.nombre+"</option>");

                });


             });
        }
        else{
           

            $.each(json, function(index, subCatObj){
                 ruta.append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
             });
            
        }





        




},

    error : function(xhr, status) {
        console.log('Disculpe, existió un problema '+token);
    },
});


});
}


function toggleHidden(status){
    if(status == 'on')
        $( "#descripcion" ).addClass( "hidden_on" );
    else{
        $( "#descripcion" ).removeClass( "hidden_on" );

    }

}
function selectByTabsSinAccion(ruta,token,url,idSelectDestino,option1,option2){
var idTab = $(ruta);
//var idSelect = idSelect;
var token = $(token).val();

var urlE = $(url).val();
var ruta = $(ruta+' select'+idSelectDestino);
    $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
       data: {
            "_token": token,
            "idBuscar": option1,
        },
        //Cambiar a type: POST si necesario
        type: "post",
        async : false,
        // Formato de datos que se espera en la respuesta
        dataType: "json",
        // URL a la que se enviará la solicitud Ajax
        url:urlE ,
        beforeSend:function() {
            $('#loading').show();
        },
        complete: function(){
            $('#loading').hide();
        },
        success : function(json) {
            ruta.empty();
            ruta.append("<option value=''>Seleccione la "+idSelectDestino+"</option>");
            if(url ==="#getCampusByPais"){
                $.each(json, function(index, subCatObj){
                ruta.append(" <optgroup label='"+subCatObj.nombre+"'>");
                    

                    $.each(subCatObj.campus_sedes_r, function(index2, subCatObj2){

                        ruta.append("<option value="+subCatObj2.id+">"+subCatObj2.nombre+"</option>");

                    });


                 });
            }
            else{
                $.each(json, function(index, subCatObj){
                     ruta.append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
                 });
                
            }

            ruta.val(option2);




            




    },

        error : function(xhr, status) {
            console.log('Disculpe, existió un problema en selectByTabsSinAccion '+token);
        },
    });


}

 function getListForSelect(url, token, idBuscar, nomSelect2,classSelect2 = "",optionSelected = "",tabActive = "") {     
 	if(classSelect2 === ""){


 		var idSelector = "#"+nomSelect2;	
 	}
 	else{

 		var idSelector = "."+classSelect2;	
 	}



	$.ajax({
	    // En data puedes utilizar un objeto JSON, un array o un query string
	   data: {
			"_token": token,
			"idBuscar": idBuscar,
			"nomTable": nomSelect2
		},
	    //Cambiar a type: POST si necesario
	    type: "post",
	    // Formato de datos que se espera en la respuesta
	    dataType: "json",
	    // URL a la que se enviará la solicitud Ajax
	    url:url ,
        beforeSend:function() {
            $('#loading').show();
        },
        complete: function(){
            $('#loading').hide();
        },
	    success : function(json) {

            if(tabActive === ""){



                $(idSelector).empty();
                $(idSelector).append("<option value=''>Seleccione "+nomSelect2+"</option>");
                $.each(json, function(index, subCatObj){

                $(idSelector).append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
        
                
                });
                $(idSelector).find('option').removeAttr("selected");
                //$(idSelector).val(optionSelected);

                $(idSelector+" option[value='"+optionSelected+"']").attr("selected","selected");
            }
            else{

                $("."+tabActive).find(idSelector).empty();
                $("."+tabActive).find(idSelector).append("<option value=''>Seleccione "+nomSelect2+"</option>");
                $.each(json, function(index, subCatObj){

                $("."+tabActive).find(idSelector).append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
        
                
                });
                $("."+tabActive).find(idSelector).find('option').removeAttr("selected");
                //$(idSelector).val(optionSelected);
                $("."+tabActive).find(idSelector).val(optionSelected);
                //$($("."+tabActive).find(idSelector)+" option[value='"+optionSelected+"']").attr("selected","selected");
            }
           // $(idSelector).val(optionSelected);
            //$(idSelector).change();
		},

	    error : function(xhr, status) {
	        console.log('Disculpe, existió un problema '+token);
	    },
	});
	
}


 function guardarUniversidad(data,url) {     
 	





	$.ajax({
	    // En data puedes utilizar un objeto JSON, un array o un query string
	   data: {
			"_token": token,
			"idBuscar": idBuscar,
			"nomTable": nomSelect2
		},
	    //Cambiar a type: POST si necesario
	    type: "post",
	    // Formato de datos que se espera en la respuesta
	    dataType: "json",
	    // URL a la que se enviará la solicitud Ajax
	    url:url ,
        beforeSend:function() {
            $('#loading').show();
        },
        complete: function(){
            $('#loading').hide();
        },
	    success : function(json) {
	    	$(idSelector).empty();
	    	$(idSelector).append("<option value=''>Seleccione "+nomSelect2+"</option>");
			$.each(json, function(index, subCatObj){

			$(idSelector).append("<option value="+subCatObj.id+">"+subCatObj.nombre+"</option>");
			$("select"+idSelector).find("option#2").attr("selected", "selected");	
			})
		},
	    error : function(xhr, status) {
	        console.log('Disculpe, existió un problema');
	    },
	});
	
}


function formatoTablaUniversidad( d ) {

    var finaln = '<table class="table table-striped table-bordered table-hover">'+
        '<tr><th>Nombre campus</th><th>Teléfono</th><th>fax</th><th>Sitio web</th><th>Ciudad</th></tr>';
       (d.campus_sedes_r).forEach(function(entry) {

        finaln =   finaln+
        '<tr>'+
            '<td>'+entry.nombre+'</td>'+
            '<td>'+entry.telefono+'</td>'+
            '<td>'+entry.fax+'</td>'+
            '<td><a href="'+entry.sitio_web+'">'+entry.sitio_web+'</a></td>'+
            '<td> '+entry.ciudad_r.nombre+'</td>'+
        '</tr>';
});
      finaln = finaln+'</table>';
  //      console.log(entry.id);

    return finaln;
}


function crearTablaUniversidad(idTabla,url){



	    var dt = $(idTabla).DataTable( {


        "ajax": url,
                    "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
                     "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
                    "bProcessing": true,

        "columns": [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
            },
            { "data": "id",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html("<a href='universidades/edit/"+oData.id+"'>"+oData.id+"</a>");
                }
            },
            { "data": "nombre" },
            { "data": null,
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                
                    $(nTd).attr('align','center');
                    $(nTd).html("<a class='btn btn-primary btn-xs' href='universidades/edit/"+oData.id+"'> <i class='fa fa-pencil'></i></a>"+
                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.id+"'> <i class='fa fa-trash-o'></a>"
                        );

                }
            }
        ],
    } );
 
    // Array to track the ids of the details displayed rows
    var detailRows = [];

    $(idTabla+' tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
              

            row.child( formatoTablaUniversidad( row.data() ) ).show();
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );

}



function createInput(label,placeholder,id,value){





                
    return '<div class="form-group">'+

                '<label class="col-sm-2 col-sm-2 control-label" for="'+id+'"> '+label+' </label>'+
                '<div class="col-sm-10">'+
                    '<input class="form-control" value="'+value+'" placeholder="'+placeholder+'" name="'+id+'" type="text" id="'+id+'">'+
                '</div>'+
            '</div>';

    
}

function crearTab(arrayCampus,urlStoreCampus,urlConsultaSelect,token){
    //           console.log(arrayCampus);    
    // create the tab
    $('<li><a id ="tabHead'+arrayCampus.id+'" href="#tab'+arrayCampus.id+'" data-toggle="tab">Campus: '+arrayCampus.nombre+'</a><span id="'+arrayCampus.id+'" class="btn-delete remove-tab glyphicon-remove glyphicon">  </span></li>').appendTo('#tabs');
                        
    // create the tab content
    var content ='<div class="tab-pane" id="tab'+arrayCampus.id+'">';
    var input1 = createInput('Nombre del campus','Ej: Isla Teja','nombre'+arrayCampus.id,arrayCampus.nombre);
    var input2 = createInput('N° Telefónico','Ej:+560632222222','telefono'+arrayCampus.id, arrayCampus.telefono);
    var input3 = createInput('Nombre N° fax ','Ej:+560632222222','fax'+arrayCampus.id, arrayCampus.fax);
    var input4 = createInput('sitio web del campus','Ej: www.uach.cl','sitio_web'+arrayCampus.id, arrayCampus.sitio_web);
    var input5 = createInput('Dirección','Ej: santiago #656','direccion'+arrayCampus.id, arrayCampus.direccion);


    content = content +'<form method="POST" action="'+urlStoreCampus+'" accept-charset="UTF-8">'+
                        input1+
                        input2+
                        input3+
                        input4+'<div class="form-group">'+
                                    '<label class="col-sm-2 col-sm-2 control-label" for="ciudad"> Nombre ciudad </label>'+
                                    '<div class="col-sm-10">'+
                                        '<select id="ciudad'+arrayCampus.id+'" class="miCiudad form-control">'+
                                        '<option selected="selected" value="">Seleccione unA ciudad</option>'+
                                        '</select>'+
                                    '</div>'+
                                '</div>'+
                        input5;

    content = content +'<a href="#!" id="'+arrayCampus.id+'" class="btn-edit-campus btn btn-primary" >Editar campus</a></form></div>';



    $(content).appendTo('.tab-content');
    //console.log(subCatObj.ciudad_r.pais);
    $("#ciudad"+arrayCampus.id).find('option').removeAttr("selected");



  /*  getListForSelect(urlConsultaSelect, 
                    token, 
                    arrayCampus.pais, 
                    'ciudad'+arrayCampus.id,
                    "",
                    arrayCampus.ciudad) */

}

  function crearTabByUniversidad(campusSedes,urlStoreCampus, urlConsultaSelect,token){
    var campusSede = new Object();

    $.each(campusSedes, function(index, subCatObj){
        //console.log(subCatObj);
        campusSede.id = subCatObj.id;
        campusSede.nombre = subCatObj.nombre;
        campusSede.telefono = subCatObj.telefono;
        campusSede.fax = subCatObj.fax;
        campusSede.sitio_web = subCatObj.sitio_web;
        campusSede.pais = subCatObj.ciudad_r.pais;
        campusSede.ciudad = subCatObj.ciudad_r.id;
        campusSede.direccion = subCatObj.direccion;

        crearTab(campusSede,urlStoreCampus,urlConsultaSelect,token)
   
    });
    $('#tabs a:last').tab('show');


    

   // $("#rararara option[value='2']").attr("selected","selected");
}


function traerInfoUniversidad(idInput,urlStoreCampus, urlConsultaSelectPais,urlConsultaSelectCiudad, token ){
    var idInput = '#'+idInput;
    var jsonUniversidad = JSON.parse($(idInput).val())[0];
    var campusSedes = jsonUniversidad.campus_sedes_r;
    var idContinente = campusSedes[0].ciudad_r.pais_r.continente;
    var idPais = campusSedes[0].ciudad_r.pais_r.id;

    selectByTabsSinAccion(".form-horizontal",token,urlConsultaSelectPais,'#pais',idContinente,idPais);

    $('#continente').val( jsonUniversidad.campus_sedes_r[0].ciudad_r.pais_r.continente_r.id);
    $('#nombre_universidad').val( jsonUniversidad.nombre);
    crearTabByUniversidad(campusSedes,urlStoreCampus,urlConsultaSelectCiudad,token);


}


function CrearTabPorCampus(urlStoreCampus,token,form,idPais,ciudadByPais){

      var html = "";
      $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
       data:form.serialize(),
        //Cambiar a type: POST si necesario
        type: "post",
        // Formato de datos que se espera en la respuesta
        dataType: "json",
        // URL a la que se enviará la solicitud Ajax
        url:urlStoreCampus ,
        beforeSend:function() {
            $('#loading').show();
        },
        complete: function(){
            $('#loading').hide();
        },
        success : function(json) {
            //console.log(json);
          var i = true;
          $.each(json, function(index, subCatObj){
       
            var campusSede = new Object();

            if(i){ // solo creo un tabs para el ultimo registro campus agregado
              campusSede.id = subCatObj.id;
              campusSede.nombre = subCatObj.nombre;
              campusSede.telefono = subCatObj.telefono;
              campusSede.fax = subCatObj.fax;
              campusSede.sitio_web = subCatObj.sitio_web;
              campusSede.pais = idPais;
              campusSede.ciudad = subCatObj.ciudad;
              campusSede.direccion = subCatObj.direccion;

              crearTab(campusSede,urlStoreCampus,ciudadByPais,token);


            selectByTabsSinAccion("div#tab"+campusSede.id,token,ciudadByPais,'#ciudad'+campusSede.id,campusSede.pais,campusSede.ciudad);
            //  selectByTabsSinAccion('div#tab'+campusSede.id ,token,ciudadByPais,'#ciudad'+campusSede.id,campusSede.pais,campusSede.ciudad);
            i = false;
            }
           // $('#holamundo').trigger("reset");

            $('#modal_campus_universidad').modal('hide');

          //alert();
      
          })
        },

        error : function(xhr, status) {
            html += "<p> Porfavor corregir los siguientes errores </p>";
            responseJSON =  JSON.parse(xhr.responseText);

            for(var key in responseJSON)
            {
                html += "<li>" + responseJSON[key][0] + "</li>";
            }
            $(".alert-success").hide()
            $(".alert-danger").html(html).show();
        },

    });
}