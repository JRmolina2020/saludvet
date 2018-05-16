
var tablamascota;

 function initmascota(){
	
	limpiarmascota();
	guardaryeditarmascota();
	//obtiene el valor
	var idcliente = document.formulariomascota.cliente_idcliente.value;
	listarmascota(idcliente);
	
	
	
	

$("#imagenmuestramascota").hide();

}
//Función limpiarmascota
function limpiarmascota()
{
	$("#nombre").val("");
	$("#sexo").val("");
	$("#raza").val("");
	$("#procedencia").val("");
	$("#edad").val("");
	$("#categoria").val("");
	$("#descripcion").val("");
	$("#nivel").val("");
	$("#idmascota").val("");
	// ___________________________________________
	$("#imagenmuestramascota").attr("src","");
	$("#imagenactualmascota").val("");
	$("#cuadritoimagenmascota").hide();
	$('#modalmascota').on('shown.bs.modal', function () {
	$('#formulariomascota').find('[name="nombre"]').focus();});

}

//Función listarmascota
function listarmascota(idcliente)

{
	var receptor = idcliente;
	tablamascota=$('#listadomascota').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tablamascota
	    buttons: [		 
	           
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{

			url: '../controller/mascota.php?op=listar',
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

function guardaryeditarmascota(e)
{
// VALIDATION formulariomascota
$('#formulariomascota') .bootstrapValidator({
	message: 'This value is not valid',
	feedbackIcons: {
            valid: 'fa fa-paw',
            invalid: 'fa fa-exclamation-circle',
            validating: 'fa fa-sync-alt'
},
	fields: {
	
		nombre: {
			message: 'Nombre de la mascota invalido',
			validators: {
				notEmpty: {
					message: 'El Nombre de la mascota  es obligatorio y no puede estar vacio.'
				},
				stringLength: {
					min: 3,
					max: 20,
					message: 'Minimo 3 caracteres y Maximo 20 '
				},
				
			}
		},
		sexo: {
			message: 'El sexo de la mascota  es invalido',
			validators: {
				notEmpty: {
					message: 'El Sexo de la mascota es obligatorio, no puede estar vacio.'
				},
				
			}
		},
		categoria: {
			message: 'La categoria de la mascota es invalida',
			validators: {
				notEmpty: {
					message: 'La categoria de la mascota es obligatoria, no puede estar vacia.'
				},
				
			}
		},
		edad: {
			message: 'La Edad de la mascota es invalida',
			validators: {
				notEmpty: {
					message: 'La edad de la mascota es obligatoria, no puede estar vacia.'
				},
				
			}
		},
		raza: {
			message: 'La Raza de la mascota es invalida',
			validators: {
				notEmpty: {
					message: 'La Raza de la mascota es obligatoria, no puede estar vacia.'
				},
				
			}
		},
		
		
	}
})

// end validaciones
.on('success.form.bv', function(e) {
// ---------------------------------------
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardarmascota").prop("disabled",false);
	var formData = new FormData($("#formulariomascota")[0]);

	$.ajax({
		url: "../controller/mascota.php?op=guardaryeditar",
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
	    	limpiarmascota();	
	    	  $('#modalmascota').modal('hide');
	    	  $('#formulariomascota').bootstrapValidator("resetForm",true); 
	          tablamascota.ajax.reload();
	        
	    }

	});
	});
}

// end save
function mostrarmascota(idmascota)
{
	$.post("../controller/mascota.php?op=mostrar",{idmascota : idmascota}, function(data, status)
	{
		data = JSON.parse(data);
		$("#cuadritoimagenmascota").show();
	   $('#modalmascota').modal('show');
	   // -----------------------------------
	   	$("#idmascota").val(data.idmascota);
		$("#nombre").val(data.nombre);
		  $("#categoria").val(data.categoria).change();
		   $("#raza").val(data.raza).change();
		    $("#procedencia").val(data.procedencia).change();
		    $("#edad").val(data.edad);
		 $("#sexo").val(data.sexo).change();
		$("#descripcion").val(data.descripcion);
		// -------------------------------------
		$("#imagenmuestramascota").show();
		$("#imagenmuestramascota").attr("src","../files/mascota/"+data.imagen);
		$("#imagenactualmascota").val(data.imagen);

 	})
}
//Función para eliminar registros
function eliminarmascota(idmascota)
{
 swal({
  title: "Desea eliminar esta mascota Recuerde una vez eliminada no se podra recuperar la informacion!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'SI, ELIMINAR!'
}).then((result) => {
  if (result.value) {
  	$.post("../controller/mascota.php?op=eliminar", {idmascota : idmascota}, function(e){
        		 swal(e);
	            tablamascota.ajax.reload();
       });	
   
  }
})
}

function cerrarformulariomascota(){
$("#cuadritoimagenmascota").hide();
$('#formulariomascota').bootstrapValidator("resetForm",true); 
limpiarmascota();

}

//
function mostrarcliente(idcliente)
{
	$.post("../controller/cliente.php?op=mostrar",{idcliente : idcliente}, function(data, status)
	{
		data = JSON.parse(data);		
		$("#clientemuestra").val(data.nombre);
		
 	})
}

function selectvalidar(){
var vcategoria = document.formulariomascota.categoria.value;
if(vcategoria=='PAJARO'){

    var raza = ["Avestruz.", "Buitre","Canario","Loro","Cigüeña"]; //Tu array de raza
 
}else if(vcategoria=='PERRO'){
	var raza = ["Pitbull", "Criollo","Pincher","P.aleman","Boxer"]; //Tu array de raza

}else if (vcategoria=='GATO'){
var raza = ["Abisinio", "Alemán","American curl","American shorthair","Normal"]; //Tu array de raza
}

document.getElementById("raza").length=0;
var select = document.getElementById("raza"); //Seleccionamos el select
    for(var i=0; i < raza.length; i++){ 
        var option = document.createElement("option"); //Creamos la opcion
        option.innerHTML = raza[i]; //Metemos el texto en la opción
        select.appendChild(option); //Metemos la opción en el select
    }

}


initmascota();





