 function getListForSelect(url, token, idBuscar, nomSelect2,classSelect2 = "") {     
 	
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
            '<td> <a href="/ciudades/edit/'+entry.ciudad.id+'">'+entry.ciudad.nombre+'</a></td>'+
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
            { "data": "nombre" }
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