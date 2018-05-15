<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($correo,$password,$nombre,$nivel,$imagen)
	{
		$sql="INSERT INTO usuario (correo,password,nombre,nivel,imagen,bloqueo)
		VALUES ('$correo','$password','$nombre','$nivel','$imagen','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$correo,$password,$nombre,$nivel,$imagen)
	{
		$sql="UPDATE usuario SET idusuario='$idusuario',correo='$correo',password='$password',nombre='$nombre',nivel='$nivel',imagen='$imagen' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($idusuario)
	{
		$sql="DELETE FROM usuario  WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}


	//Implementamos un método para desactivar registros
	public function bloquear($idusuario,$bloqueo)
	{
       if ($bloqueo==1) {
		$sql="UPDATE usuario SET bloqueo='0' WHERE idusuario='$idusuario'";
       }else{
		$sql="UPDATE usuario SET bloqueo='1' WHERE idusuario='$idusuario'";
	
       }
      	return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM usuario ";
		return ejecutarConsulta($sql);		
	}


}

?>