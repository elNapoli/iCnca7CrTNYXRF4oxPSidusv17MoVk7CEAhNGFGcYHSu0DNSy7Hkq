function selectByTabs(ruta,idSelect,token,url,idSelectDestino){
    //idTab: Selector padre(ej:div)- idSelect: Elemento en cuestion(Ej: pais)
var idTab = $(ruta);
var idSelect = idSelect;
var token = $(token).val();
var urlE = $(url).val();
//var idSelectDestino = '#'+idSelectDestino;

var ruta = $(ruta+' select'+idSelectDestino); //idSelectDestino: es el id del objeto donde se carga la respuesta ajax
                                    //Ruta: es esa mierda que hay que buscar entre los selectores <div>
                    
idTab.on('change',idSelect,function(e){   

$.ajax({
    // En data puedes utilizar un objeto JSON, un array o un query string
   data: {
        "_token": token,
        "idBuscar": $(this).val(),
    },
    //Cambiar a type: POST si necesario
    type: "post",
    // Formato de datos que se espera en la respuesta
    dataType: "json",
    // URL a la que se enviará la solicitud Ajax
    url:urlE ,
    success : function(json) {
        ruta.empty();
        ruta.append("<option value=''>Seleccione la "+idSelectDestino+"</option>");

        if(url ==="#getCampusByPais"){
            $.each(json, function(index, subCatObj){
            ruta.append(" <optgroup label='"+subCatObj.nombre+"'>");
                

                $.each(subCatObj.campus_sedes, function(index2, subCatObj2){

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



function selectByTabsSinAccion(ruta,idSelect,token,url,idSelectDestino,option1,option2){
var idTab = $(ruta);
var idSelect = idSelect;
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
        // Formato de datos que se espera en la respuesta
        dataType: "json",
        // URL a la que se enviará la solicitud Ajax
        url:urlE ,
        success : function(json) {
            ruta.empty();
            ruta.append("<option value=''>Seleccione la "+idSelectDestino+"</option>");

            if(url ==="#getCampusByPais"){
                $.each(json, function(index, subCatObj){
                ruta.append(" <optgroup label='"+subCatObj.nombre+"'>");
                    

                    $.each(subCatObj.campus_sedes, function(index2, subCatObj2){

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
            console.log('Disculpe, existió un problema '+token);
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

    var finaln = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr><th>Nombre campus</th><th>Teléfono</th><th>fax</th><th>Sitio web</th><th>Ciudad</th></tr>';
       (d.campus_sedes).forEach(function(entry) {

        finaln =   finaln+
        '<tr>'+
            '<td>'+entry.nombre+'</td>'+
            '<td>'+entry.telefono+'</td>'+
            '<td>'+entry.fax+'</td>'+
            '<td><a href="'+entry.sitio_web+'">'+entry.sitio_web+'</a></td>'+
            '<td> <a href="/ciudades/edit/'+entry.ciudad.id+'">'+entry.ciudad_r.nombre+'</a></td>'+
        '</tr>';
});
      finaln = finaln+'</table>';
  //      console.log(entry.id);

    return finaln;
}


function crearTablaUniversidad(idTabla,url){



	    var dt = $(idTabla).DataTable( {


        "ajax": url,


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
                    $(nTd).html("<a href='universidades/edit/"+oData.id+"'> Edit</a>"+
                                "<a href='#!' class='btn-delete' id='"+oData.id+"'> Del</a>"
                        );

                }
            }
        ],
        "order": [[1, 'asc']]
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

            '<label for="'+id+'"> '+label+' </label>'+

            '<input class="form-control" value="'+value+'" placeholder="'+placeholder+'" name="'+id+'" type="text" id="'+id+'">'+
            '</div>';

    
}

function crearTab(arrayCampus,urlStoreCampus,urlConsultaSelect,token){
                   
    // create the tab
    $('<li><a id ="tabHead'+arrayCampus.id+'" href="#tab'+arrayCampus.id+'" data-toggle="tab">Campus: '+arrayCampus.nombre+'</a></li>').appendTo('#tabs');
                        
    // create the tab content
    var content ='<div class="tab-pane" id="tab'+arrayCampus.id+'">';
    var input1 = createInput('Nombre del campus','Ej: Isla Teja','nombre'+arrayCampus.id,arrayCampus.nombre);
    var input2 = createInput('N° Telefónico','Ej:+560632222222','telefono'+arrayCampus.id, arrayCampus.telefono);
    var input3 = createInput('Nombre N° fax ','Ej:+560632222222','fax'+arrayCampus.id, arrayCampus.fax);
    var input4 = createInput('sitio web del campus','Ej: www.uach.cl','sitio_web'+arrayCampus.id, arrayCampus.sitio_web);




    content = content +'<form method="POST" action="'+urlStoreCampus+'" accept-charset="UTF-8">'+
                        input1+
                        input2+
                        input3+
                        input4+'<div class="form-group">'+
                                    '<label for="pais"> Nombre país </label>'+
                                    '<select id="ciudad'+arrayCampus.id+'" class="miCiudad form-control">'+
                                    '<option selected="selected" value="">Seleccione un país</option>'+
                                    '</select>'+
                                '</div>';


    content = content +'<a href="#!" class="btn-delete" id="'+arrayCampus.id+'">Eliminar campus</a></form></div>';



    $(content).appendTo('.tab-content');
    //console.log(subCatObj.ciudad_r.pais);
    $("#ciudad"+arrayCampus.id).find('option').removeAttr("selected");

            //$("#ciudad"+subCatObj.id).val('3')
    getListForSelect(urlConsultaSelect, 
                    token, 
                    arrayCampus.pais, 
                    'ciudad'+arrayCampus.id,
                    "",
                    arrayCampus.ciudad) 

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


        crearTab(campusSede,urlStoreCampus,urlConsultaSelect,token)
   
    });
    $('#tabs a:last').tab('show');


    

   // $("#rararara option[value='2']").attr("selected","selected");
}


function traerInfoUniversidad(idInput,urlStoreCampus, urlConsultaSelectPais,urlConsultaSelectCiudad, token ){
    var idInput = '#'+idInput;
    var jsonUniversidad = JSON.parse($(idInput).val())[0];
    var campusSedes = jsonUniversidad.campus_sedes;
    var idContinente = campusSedes[0].ciudad_r.pais_r.continente;
    var idPais = campusSedes[0].ciudad_r.pais_r.id;
    $("#continente option[value='"+idContinente+"']").attr("selected","selected");
    getListForSelect(urlConsultaSelectPais, token, idContinente, 'pais','',idPais); 

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
              crearTab(campusSede,urlStoreCampus,ciudadByPais,token);
              i = false;
            }
            $(".alert-success").html("El registro fue guardado exitosamente").show();
            $(".alert-danger").hide();
            //reseteo el formulario
            $('#holamundo').trigger("reset");

            $('#modal_campus_universidad').modal('hide');

          //alert();
      
          })
        },

        error : function(xhr, status) {
            html += "<p> Porfavor corregir los siguientes errores </p>";
            for(var key in xhr.responseJSON)
            {
                html += "<li>" + xhr.responseJSON[key][0] + "</li>";
            }
            $(".alert-success").hide()
            $(".alert-danger").html(html).show();
        },

    });
}