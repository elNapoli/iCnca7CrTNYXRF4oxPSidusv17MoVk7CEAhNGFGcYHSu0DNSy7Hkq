function initDocumentoIdentidad(){

	if ( $.fn.dataTable.isDataTable( '#tableDocumentoIdentidad' ) ) {
	    var dt  = $('#tableDocumentoIdentidad').DataTable().ajax.reload();
	}
	else {
	var dt = $('#tableDocumentoIdentidad').DataTable( {


        "ajax": $('#getUrlDocumentoByPostulante').val(),
        'searching':false,
        "paging":   false,
        "info":     false,
        "columns": [
           
            { "data": "tipo" },
            { "data": "numero" },
            { "data": null,
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html("<a href='#!' id='"+oData.id+"' class='delete_documento_identidad'> Del</a>"
                        );

                }
            }
        ],
    } );



	 $('#tableDocumentoIdentidad tbody').on( 'click', 'tr', function () {
	 	$('#numero').val( dt.row( this ).data().numero);
	 	$('#tipo').val( dt.row( this ).data().tipo);
	        if ( $(this).hasClass('selected') ) {
	            $(this).removeClass('selected');
	        }
	        else {
	            dt.$('tr.selected').removeClass('selected');
	            $(this).addClass('selected');
	        }
    	});
	 $('#tableDocumentoIdentidad').on('click','.delete_documento_identidad',function(){

	    $.ajax({
	        // En data puedes utilizar un objeto JSON, un array o un query string
	        data:{id:$(this).attr('id'),_token:$('#_token').val()},
	        //Cambiar a type: POST si necesario
	        type: "post",
	        // Formato de datos que se espera en la respuesta
	        dataType: "json",
	        // URL a la que se enviará la solicitud Ajax
	        url:$('#getUrlDocumentoDestroy').val(),
	        success : function(json) {
	   
	            $('#msg-modal').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
	                      
	                        dt.ajax.reload();   
	  
	        },

	        error : function(xhr, status) {
	        	responseJSON =  JSON.parse(xhr.responseText);
	            var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                        for(var key in responseJSON)
	                        {
	                            html += "<li>" + responseJSON[key][0] + "</li>";
	                        }
	                        $('#msg-modal').html(html+'</div>');


	        },
	    }); 
	 }),
	 $('#add_doc_identidad_by_postulante').on('click',function(){



	    var data = $('#form-save-doc-identidad').serialize();
	    $.ajax({
	        // En data puedes utilizar un objeto JSON, un array o un query string
	        data:data,
	        //Cambiar a type: POST si necesario
	        type: "post",
	        // Formato de datos que se espera en la respuesta
	        dataType: "json",
	        // URL a la que se enviará la solicitud Ajax
	        url:$('#form-save-doc-identidad').attr('action'),
	        success : function(json) {
	   
	            $('#msg-modal').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>'+json.message+'</div>');   
	                      
	                        dt.ajax.reload();   
	  
	        },

	        error : function(xhr, status) {
	        	responseJSON =  JSON.parse(xhr.responseText);
	            var html = '<div class="alert alert-danger fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button><p> Porfavor corregir los siguientes errores:</p>';
	                        for(var key in responseJSON)
	                        {
	                            html += "<li>" + responseJSON[key][0] + "</li>";
	                        }
	                        $('#msg-modal').html(html+'</div>');


	        },
	    }); 



	 });




	}





}