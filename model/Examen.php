<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Examen
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($frespiratoria,$fcardiaca,$peso,$pulso,$temperatura,$hidratacion,$actitud,$ccorporal,$idmascota)
	{
		$sql="INSERT INTO examen (frespiratoria,fcardiaca,peso,pulso,temperatura,hidratacion,actitud,ccorporal,idmascota,fecha)
		VALUES ('$frespiratoria','$fcardiaca','$peso','$pulso','$temperatura','$hidratacion','$actitud','$ccorporal','$idmascota',now())";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idexamen,$frespiratoria,$fcardiaca,$peso,$pulso,$temperatura,$hidratacion,$actitud,$ccorporal,$idmascota)
	{
		$sql="UPDATE examen SET idexamen='$idexamen',frespiratoria='$frespiratoria',fcardiaca='$fcardiaca',peso='$peso',pulso='$pulso',temperatura='$temperatura',hidratacion='$hidratacion',actitud='$actitud',ccorporal='$ccorporal',idmascota='$idmascota'WHERE idexamen='$idexamen'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($idexamen)
	{
		$sql="DELETE FROM examen  WHERE idexamen='$idexamen'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idexamen)
	{
		$sql="SELECT * FROM examen WHERE idexamen='$idexamen'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar($idmascota)
	{
		$sql="SELECT * FROM examen inner join mascota on mascota.idmascota = examen.idmascota where mascota.idmascota='$idmascota'";
		return ejecutarConsulta($sql);		
	}

//PDF DE HISTORIA
	public function listarhistoria($idexamen)
	{
		$sql="SELECT cedula,cliente.nombre,apellido,telefono,ciudad,barrio,direccion,mascota.nombre as mascotax,categoria,sexo,raza,edad, procedencia,descripcion,imagen,frespiratoria,fcardiaca,hidratacion,peso,pulso,temperatura,actitud,ccorporal,fecha from cliente INNER JOIN mascota ON mascota.cliente_idcliente = cliente.idcliente INNER JOIN examen ON examen.idmascota = mascota.idmascota
		    where examen.idexamen='$idexamen'";
		   return ejecutarConsulta($sql);		
	}





}

?>