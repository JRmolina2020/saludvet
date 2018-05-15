<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Cliente
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($cedula,$nombre,$apellido,$telefono,$ciudad,$barrio,$direccion)
	{
		$sql="INSERT INTO cliente (cedula,nombre,apellido,telefono,ciudad,barrio,direccion)
		VALUES ('$cedula','$nombre','$apellido','$telefono','$ciudad','$barrio','$direccion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcliente,$cedula,$nombre,$apellido,$telefono,$ciudad,$barrio,$direccion)
	{
		$sql="UPDATE cliente SET idcliente='$idcliente',cedula='$cedula',nombre='$nombre',apellido='$apellido',telefono='$telefono',ciudad='$ciudad',barrio='$barrio',direccion='$direccion' WHERE idcliente='$idcliente'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($idcliente)
	{
		$sql="DELETE FROM cliente  WHERE idcliente='$idcliente'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcliente)
	{
		$sql="SELECT * FROM cliente WHERE idcliente='$idcliente'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM cliente order by idcliente desc";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar pdf por cliente
	public function listarpdf($idcliente)
	{
		$sql="SELECT * FROM cliente where idcliente = '$idcliente'";
		return ejecutarConsulta($sql);		
	}



}

?>