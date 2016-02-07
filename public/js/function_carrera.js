function initCarrera(){
	
	$('.modal-dialog').css('width', '750px');
	selectByTabs("modal_crear_carrera",'continente','getToken','getUrlPaisByContinente','pais','div#boyd-modal div div select');

	selectByTabs("modal_crear_carrera",'pais','getToken','gerUrlUniversidadByPais','campus_sede','div#boyd-modal div div select');
	selectByTabs("modal_crear_carrera",'campus_sede','getToken','getUrlFacultadesByCampus','facultad','div#boyd-modal div div select');
	$('#btnAddCarrera').on('click', function(e){

	    var data = $('#form-save').serialize();

	    $.ajax({
	        // En data puedes utilizar un objeto JSON, un array o un query string
	       data:data,
	        //Cambiar a type: POST si necesario
	        type: "post",
	        // Formato de datos que se espera en la respuesta
	        dataType: "json",
	        // URL a la que se enviará la solicitud Ajax
	        url:$('#form-save').attr('action') ,
	        success : function(json) {
	            $('.message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
	            $('#modal_crear_carrera').modal('hide'); 
	            dt.ajax.reload();            
	  
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


	});
}