<?php 

require_once "../model/examen.php";

$examen = new Examen();

$idexamen=isset($_POST["idexamen"])? limpiarCadena($_POST["idexamen"]):"";
$frespiratoria=isset($_POST["frespiratoria"])? limpiarCadena($_POST["frespiratoria"]):"";
$fcardiaca=isset($_POST["fcardiaca"])? limpiarCadena($_POST["fcardiaca"]):"";
$peso=isset($_POST["peso"])? limpiarCadena($_POST["peso"]):"";
$pulso=isset($_POST["pulso"])? limpiarCadena($_POST["pulso"]):"";
$temperatura=isset($_POST["temperatura"])? limpiarCadena($_POST["temperatura"]):"";
$hidratacion=isset($_POST["hidratacion"])? limpiarCadena($_POST["hidratacion"]):"";
$actitud=isset($_POST["actitud"])? limpiarCadena($_POST["actitud"]):"";
$ccorporal=isset($_POST["ccorporal"])? limpiarCadena($_POST["ccorporal"]):"";
$idmascota=isset($_POST["idmascota"])? limpiarCadena($_POST["idmascota"]):"";

$KG= " KG";
$MIN=" *MIN";
$GRADO=" GRADOS";

switch ($_GET["op"]){
	case 'guardaryeditar':

		if (empty($idexamen)){
			$rspta=$examen->insertar($frespiratoria.$MIN,$fcardiaca.$MIN,$peso.$KG,$pulso.$MIN,$temperatura.$GRADO,$hidratacion,$actitud,$ccorporal,$idmascota);
			echo $rspta ? "examen registrado" : "examen no se pudo registrar";
		}
		else {
			$rspta=$examen->editar($idexamen,$frespiratoria,$fcardiaca,$peso,$pulso,$temperatura,$hidratacion,$actitud,$ccorporal
				,$idmascota);
			echo $rspta ? " examen actualizado" : "examen no se pudo actualizar";
		}
	break;

	case 'eliminar':
		$rspta=$examen->eliminar($idexamen);
 		echo $rspta ? "examen eliminado" : "examen no se puede eliminar";
 		break;
	break;

	case 'mostrar':
		$rspta=$examen->mostrar($idexamen);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
      $idmascota= $_GET["receptor"];
		$rspta=$examen->listar($idmascota);
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning btn-xs" onclick="mostrarexamen('.$reg->idexamen.')"><i class="fa fa-pencil"></i></button>'.
                    '<button class="btn btn-danger btn-xs " onclick="eliminarexamen('.$reg->idexamen.')">
                    <i class="fa fa-trash"></i></button>'.
                    '<a class="btn btn-success btn-xs" role="button" href="../reportes/rpthistoria.php?examen='.$reg->idexamen.'">
                    <i class="fa fa-newspaper-o"></i></a>'
                    ,
                "1"=>$reg->fecha,
 				"2"=>$reg->frespiratoria,
 				"3"=>$reg->fcardiaca,
 				"4"=>$reg->peso,
 				"5"=>$reg->pulso,
 				"6"=>$reg->temperatura,
 				"7"=>$reg->hidratacion,
 				"8"=>$reg->actitud,
 				"9"=>$reg->ccorporal
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