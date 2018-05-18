
var tablaexamen;
 function initexamen(){
	limpiarexamen();
	guardaryeditarexamen();
	var idmascota = document.formularioexamen.idmascota.value;
	listarexamen(idmascota);
}
//Función limpiarexamen
function limpiarexamen()
{
	$("#frespiratoria").val("");
	$("#fcardiaca").val("");
	$("#peso").val("");
	$("#pulso").val("");
	$("#temperatura").val("");
	$("#hidratacion").val("");
	$("#actitud").val("");
	$("#ccorporal").val("");
	$("#idexamen").val("");
	// ___________________________________________
	$('#modalexamen').on('shown.bs.modal', function () {
	$('#formularioexamen').find('[name="frespiratoria"]').focus();});

}
//Función listarexamen
function listarexamen(idmascota)

{
	var receptor = idmascota;
	tablaexamen=$('#listadoexamen').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tablaexamen
	    buttons: [		 
	           
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{

			url: '../controller/examen.php?op=listar',
			data:{receptor:receptor},
            type: "GET",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

function guardaryeditarexamen(e)
{
$('#formularioexamen') .bootstrapValidator({
	message: 'This value is not valid',
	feedbackIcons: {
          
},
	fields: {
	
		peso: {
			message: 'El peso de la mascota es invalida',
			validators: {
				notEmpty: {
					message: 'El peso de la mascota es obligatoria, no puede estar vacia.'
				},
				
			}
		},
		
		
	}
})
.on('success.form.bv', function(e) {
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardarexamen").prop("disabled",false);
	var formData = new FormData($("#formularioexamen")[0]);

	$.ajax({
		url: "../controller/examen.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	    	swal({
	    		position: 'top-end',
	    		type: 'success',
	    		title: datos,
	    		showConfirmButton: false,
	    		timer: 1500
	    	});  
	    	limpiarexamen();	
	    	  $('#modalexamen').modal('hide');
	    	  $('#formularioexamen').bootstrapValidator("resetForm",true); 
	          tablaexamen.ajax.reload();
	        
	    }

	});
	});
}

// end save
function mostrarexamen(idexamen)
{
	$.post("../controller/examen.php?op=mostrar",{idexamen : idexamen}, function(data, status)
	{
		data = JSON.parse(data);
		 $('#modalexamen').modal('show');
	   	$("#idexamen").val(data.idexamen);
	   	$("#idmascota").val(data.idmascota);
	   	$("#frespiratoria").val(data.frespiratoria);
	   	$("#fcardiaca").val(data.fcardiaca);
	   	$("#ccorporal").val(data.ccorporal).change();
		  $("#hidratacion").val(data.hidratacion).change();
		   $("#peso").val(data.peso).change();
		    $("#pulso").val(data.pulso).change();
		    $("#temperatura").val(data.temperatura);
	
		$("#actitud").val(data.actitud);
	
 	})
}

//Función para eliminar registros
function eliminarexamen(idexamen)
{
 swal({
  title: "Desea eliminar este examen Recuerde una vez eliminado no se podra recuperar la informacion!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'SI, ELIMINAR!'
}).then((result) => {
  if (result.value) {
  	$.post("../controller/examen.php?op=eliminar", {idexamen : idexamen}, function(e){
        		 swal(e);
	            tablaexamen.ajax.reload();
       });	
   
  }
})
}

function cerrarformularioexamen(){
$('#formularioexamen').bootstrapValidator("resetForm",true); 
limpiarexamen();
}



initexamen();





