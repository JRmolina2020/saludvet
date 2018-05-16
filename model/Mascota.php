<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Mascota
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$sexo,$raza,$procedencia,$edad,$categoria,$descripcion,$imagen,$cliente_idcliente)
	{
		$sql="INSERT INTO mascota (nombre,sexo,raza,procedencia,edad,categoria,descripcion,imagen,cliente_idcliente)
		VALUES ('$nombre','$sexo','$raza','$procedencia','$edad','$categoria','$descripcion','$imagen','$cliente_idcliente')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idmascota,$nombre,$sexo,$raza,$procedencia,$edad,$categoria,$descripcion,$imagen,$cliente_idcliente)
	{
		$sql="UPDATE mascota SET idmascota='$idmascota',nombre='$nombre',sexo='$sexo',raza='$raza',procedencia='$procedencia'
		,edad='$edad',categoria='$categoria',descripcion='$descripcion',imagen='$imagen',cliente_idcliente='$cliente_idcliente' WHERE idmascota='$idmascota'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($idmascota)
	{
		$sql="DELETE FROM mascota  WHERE idmascota='$idmascota'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idmascota)
	{
		$sql="SELECT * FROM mascota WHERE idmascota='$idmascota'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar($idcliente)
	{
		$sql="SELECT idcliente,idmascota,mascota.nombre as Mascota,sexo,raza,procedencia,edad,categoria,descripcion,imagen FROM cliente inner join mascota ON mascota.cliente_idcliente = cliente.idcliente WHERE cliente.idcliente='$idcliente'";
		return ejecutarConsulta($sql);		
	}

}

?>