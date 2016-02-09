function initFinanciamiento(url,token){



	    $.ajax({
	        // En data puedes utilizar un objeto JSON, un array o un query string
	       data:{_token:token},
	        //Cambiar a type: POST si necesario
	        type: "get",
	        // Formato de datos que se espera en la respuesta
	        dataType: "json",
	        // URL a la que se enviará la solicitud Ajax
	        url:url,
	        success : function(json) {
	
            	$.each(json, function(index, subCatObj){


	            		if(subCatObj.nombre === 'Beca' || subCatObj.nombre === 'Otro'){

						    $('<div class="form-group">'+
						    		'<label class="radio-inline">'+
						    			'<input id="tEstudio_'+subCatObj.id+'" checked="checked" class="radioTEstudio" name="financiamiento" value="'+subCatObj.id+'" type="radio">'+
						    			subCatObj.nombre+
						    		'</label>'+
						    		'<input type="text" name="descripcion" id="tEstudioInput_'+subCatObj.id+'" placeholder="descripción" class="tEstudioInput_ form-control" disabled>'+
						    	'</div>').appendTo('#radioButtonFinanciamiento');
	            		}
	            		
						else{

						    $('<div class="form-group">'+
						    		'<label class="radio-inline">'+
						    			'<input id="tEstudio_'+subCatObj.id+'" checked="checked" class="radioTEstudio" name="financiamiento" value="'+subCatObj.id+'" type="radio">'+
						    			subCatObj.nombre+
						    		'</label>'+
						    	'</div>').appendTo('#radioButtonFinanciamiento');
						}
					});

        
            		
         
					      

	  
	        },

	        error : function(xhr, status) {
	            var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                for(var key in xhr.responseJSON)
	                {
	                    html += "<li>" + xhr.responseJSON[key][0] + "</li>";
	                }
	                $('#message-modal').html(html+'</div>');


	        },
	    }); 


	
	
}