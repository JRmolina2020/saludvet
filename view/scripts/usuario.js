var tabla;

 function initusuario(){
	listarusuario();
	limpiarusuario();
	guardaryeditarusuario();	

$("#imagenmuestra").hide();

}
//Función limpiarusuario
function limpiarusuario()
{
	$("#correo").val("");
	$("#password").val("");
	$("#nombre").val("");
	$("#nivel").val("");
	$("#bloqueo").val("");
	$("#idusuario").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$('#modalusuario').on('shown.bs.modal', function () {
	$('#formulariousuario').find('[name="correo"]').focus();});

}
//Función listarusuario
function listarusuario()
{
	tabla=$('#listadousuario').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		 
	           
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../controller/usuario.php?op=listar',
					type : "get",
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

function guardaryeditarusuario(e)
{
// VALIDATION formulariousuario
$('#formulariousuario') .bootstrapValidator({
	message: 'This value is not valid',
	feedbackIcons: {
   valid: 'fa fa-user',
            invalid: 'fa fa-exclamation-circle',
            validating: 'fa fa-sync-alt'
},
	fields: {
		// validaciones
		correo: {
			message: 'correo del usuario invalido',
			validators: {
				notEmpty: {
					message: 'El correo es obligatoria'
				},
				 emailAddress: {
                        message: 'Ingrese un correo valido'
                    },


				stringLength: {
					min: 8,
					max: 30,
					message: 'Minimo 8 caracteres y Maximo 30 caracteres '
				}
				
			}
		},

		 password: {
                validators: {
                	notEmpty: {
					message: 'El password es obligatorio y no puede estar vacio.'
				},
				stringLength: {
					min: 4,
					max: 20,
					message: 'Maximo 20 caracteres'
				},
                    identical: {
                        field: 'confirmPassword',
                        message: 'Debera confirmar el Password'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'El password no coincide con el anterior,verificar por favor'
                    }
                }
            },

		nombre: {
			message: 'Nombre del usuario invalido',
			validators: {
				notEmpty: {
					message: 'El Nombre del usuario  es obligatorio y no puede estar vacio.'
				},
				stringLength: {
					min: 3,
					max: 20,
					message: 'Minimo 3 caracteres y Maximo 20 '
				},
				
			}
		},
		
		
	}
})

// end validaciones
.on('success.form.bv', function(e) {
// ---------------------------------------
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardarusuario").prop("disabled",false);
	var formData = new FormData($("#formulariousuario")[0]);

	$.ajax({
		url: "../controller/usuario.php?op=guardaryeditar",
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
	    	limpiarusuario();	
	    	  $('#modalusuario').modal('hide');
	    	  $('#formulariousuario').bootstrapValidator("resetForm",true); 

	          tabla.ajax.reload();
	        
	    }

	});
	});
}

// end save
function mostrarusuario(idusuario)
{
	$.post("../controller/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
	{
		data = JSON.parse(data);
		$("#cuadritoimagen").show();
	   $('#modalusuario').modal('show');
		$("#correo").val(data.correo);
		$("#nombre").val(data.nombre);
		$("#password").val(data.password);
		$("#nivel").val(data.nivel);
	    $("#bloqueo").val(data.bloqueo);
		$("#idusuario").val(data.idusuario);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuario/"+data.imagen);
		$("#imagenactual").val(data.imagen);

 	})
}


//Función para eliminar registros
function eliminarusuario(idusuario)
{
 swal({
  title: "Desea eliminar este usuario, Recuerde una vez eliminado no se podra recuperar la informacion!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'SI, ELIMINAR!'
}).then((result) => {
  if (result.value) {
  	$.post("../controller/usuario.php?op=eliminar", {idusuario : idusuario}, function(e){
        		 swal(e);
	            tabla.ajax.reload();
       });	
   
  }
})
}

// desactivar registros
function bloquear(idusuario,bloqueo)
{
 swal({
  title: "Desea Bloquear a  este usuario, Recuerde una vez bloqueado no tendra acceso!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'SI, ACEPTO!'
}).then((result) => {
  if (result.value) {
  	$.post("../controller/usuario.php?op=bloquear", {idusuario:idusuario , bloqueo : bloqueo} , function(e){
        		 swal(e);
	            tabla.ajax.reload();
       });	
   
  }
})
}

function permiso(){
  swal({
  title: 'Uste no tiene permiso',
  animation: true,
  customClass: 'animated tada'
})
}

function cerrarformulariousuario(){
$('#formulariousuario').bootstrapValidator("resetForm",true); 
limpiarusuario();
$("#cuadritoimagen").hide();
}

initusuario();