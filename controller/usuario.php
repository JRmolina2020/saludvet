<?php 
require_once "../model/usuario.php";
$usuario=new Usuario();
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";
$password=isset($_POST["password"])? limpiarCadena($_POST["password"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$nivel=isset($_POST["nivel"])? limpiarCadena($_POST["nivel"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':

if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuario/" . $imagen);
			}
		}
		// ENCRYPTAR PASSWORD
		$password =md5($password);

		// 
		if (empty($idusuario)){
			$rspta=$usuario->insertar($correo,$password,$nombre,$nivel,$imagen);
			echo $rspta ? "usuario registrado" : "Artículo no se pudo registrar";
		}
		else {
			$rspta=$usuario->editar($idusuario,$correo,$password,$nombre,$nivel,$imagen);
			echo $rspta ? " usuario actualizado" : "usuario no se pudo actualizar";
		}
	break;

	case 'eliminar':
		$rspta=$usuario->eliminar($idusuario);
 		echo $rspta ? "usuario eliminado" : "usuario no se puede eliminar";
 		break;
	break;

	case 'bloquear':
	    $bloqueo = $_POST["bloqueo"];
		$rspta=$usuario->bloquear($idusuario , $bloqueo);

 		echo $rspta ? "usuario desactivado" : "usuario no se pudo desactivar";
 		break;
	break;


	case 'mostrar':
		$rspta=$usuario->mostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();
	 		while ($reg=$rspta->fetch_object()){
	 			$data[]=array(
	 				"0"=>
	 				'<button class="btn btn-warning btn-xs" onclick="mostrarusuario('.$reg->idusuario.')">
	 				<i class="fa fa-pencil"></i></button>'.
	                ' <button class="btn btn-danger btn-xs"  onclick="eliminarusuario('.$reg->idusuario.')">
	                <i class="fa fa-trash"></i></button>',
	 				"1"=>$reg->correo,
	 				"2"=>$reg->nombre,
	 				"3"=>$reg->nivel,
	 			    "4"=>"<img src='../files/usuario/".$reg->imagen."' height='50px' width='50px' >",
	 			    "5"=>($reg->bloqueo==1)?
	 			        '<span onclick="bloquear('.$reg->idusuario.','.$reg->bloqueo.')"class="label label-success">Activo</span>':
	 			        '<span onclick="bloquear('.$reg->idusuario.','.$reg->bloqueo.')"class="label label-danger">bloqueado</span>'

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