@extends('intranet.app')


@section('content')
<div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i> Validación</h4>
         
         @include('testimonio.partials.table')
      </div>
    </div><!-- col-lg-12-->         
</div><!-- /row -->

@endsection

@section("scripts")

<script type="text/javascript">


	$(document).on("ready",function(){



	var dt = $('#tableValidacionTestimonio').DataTable( {
	        	"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
	        	"bProcessing": true,
		        "ajax": "/testimonios/testimonios",
			        "columns": [

				            { "data":"postulante_r.nombre"  },
				            { "data":"postulante_r.apellido_paterno"  },
				            { "data":"postulante_r.apellido_materno"  },
				            { "data":"validado" },
				            {
				                data:   "validado",
				                render: function ( data, type, row ) {
				                    if ( type === 'display' ) {
				                        return '<input type="checkbox" class="editor-active">';
				                    }
				                    return data;
				                },
				                className: "dt-body-center",
				            },
				            { "data":"created_at" },
				            { "data": null,
				                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
	                                $(nTd).attr('align','center');

				                    $(nTd).html("<a href='/testimonios/view/"+oData.id+"' class='model-open-edit btn btn-primary btn-xs'> <i class='fa fa-eye '></i></a>"+
				                                "<a href='#!' class='btn btn-danger btn-delete btn-xs' id='"+oData.id+"'>  <i class='fa fa-trash-o'></i></a>"
				                        );

				                }
				            }

				       
				        ],
				        select: {
				            style: 'os',
				            selector: 'td:not(:last-child)' // no row selection on last column
				        },
				        rowCallback: function ( row, data ) {
				            // Set the checked state of the checkbox in the table
				            $('input.editor-active', row).prop( 'checked', data.validado == 1 );
				            $('input.editor-active', row).prop( 'id', data.id );
				        }

			    } );


			$('#tableValidacionTestimonio').on( 'change', 'input.editor-active', function () {
	
	            

	            $.ajax({
	                                  
	                async : false,
	                data:{
	                    validado: $(this).prop( 'checked' ) ? 1 : 0 ,
	                    id: $(this).attr('id'),

	                },
	                //Cambiar a type: POST si necesario
	                type: 'GET',
	                // Formato de datos que se espera en la respuesta
	                dataType: "json",
	                // URL a la que se enviará la solicitud Ajax
	                url:"/testimonios/update/"+$(this).attr('id'),

	                success : function(json) {   
	                                  
	             
	                    
	                },

	                error : function(xhr, status) {
	                    alert(status);
	              
	                },
	                


	            });

    		} );



		});
</script>

@endsection









