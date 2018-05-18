<?php 

require_once "../model/mascota.php";

$mascota=new Mascota();

$idmascota=isset($_POST["idmascota"])? limpiarCadena($_POST["idmascota"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$sexo=isset($_POST["sexo"])? limpiarCadena($_POST["sexo"]):"";
$raza=isset($_POST["raza"])? limpiarCadena($_POST["raza"]):"";
$procedencia=isset($_POST["procedencia"])? limpiarCadena($_POST["procedencia"]):"";
$edad=isset($_POST["edad"])? limpiarCadena($_POST["edad"]):"";
$categoria=isset($_POST["categoria"])? limpiarCadena($_POST["categoria"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$cliente_idcliente=isset($_POST["cliente_idcliente"])? limpiarCadena($_POST["cliente_idcliente"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactualmascota"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/mascota/" . $imagen);
			}
		}
	
		if (empty($idmascota)){
			$rspta=$mascota->insertar($nombre,$sexo,$raza,$procedencia,$edad,$categoria,$descripcion,$imagen,$cliente_idcliente);
			echo $rspta ? "Mascota registrado" : "Mascota no se pudo registrar";
		}
		else {
			$rspta=$mascota->editar($idmascota,$nombre,$sexo,$raza,$procedencia,$edad,$categoria,$descripcion,$imagen,$cliente_idcliente);
			echo $rspta ? " mascota actualizado" : "mascota no se pudo actualizar";
		}
	break;

	case 'eliminar':
		$rspta=$mascota->eliminar($idmascota);
 		echo $rspta ? "mascota eliminado" : "mascota no se puede eliminar";
 		break;
	break;

	case 'mostrar':
		$rspta=$mascota->mostrar($idmascota);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
	//parametro que recibo del cliente
       $idcliente = $_GET["receptor"];
       // end
		$rspta=$mascota->listar($idcliente);
 	
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning btn-xs" onclick="mostrarmascota('.$reg->idmascota.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger btn-xs " onclick="eliminarmascota('.$reg->idmascota.')"><i class="fa fa-trash"></i></button>'.
                    '<a class="btn btn-success btn-xs" role="button" 
                    href="../view/examen.php?client='.$reg->idcliente.'&mascot='.$reg->idmascota.'">
                     <i class="fa fa-align-justify"></i></a>'
                    ,
 				
 				"1"=>$reg->Mascota,
 				"2"=>$reg->sexo,
 				"3"=>$reg->raza,
 				"4"=>$reg->procedencia,
 				"5"=>$reg->edad,
 				"6"=>$reg->categoria,
 				"7"=>$reg->descripcion,
 			    "8"=>"<img src='../files/mascota/".$reg->imagen."' height='50px' width='50px' >"
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;


}
?>