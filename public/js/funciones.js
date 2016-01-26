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