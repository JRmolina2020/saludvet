
  <?php
  include '../config/conexion.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $usuario = $conexion ->real_escape_string(htmlentities($_POST['usuario']));
  $contra = $conexion ->real_escape_string(htmlentities($_POST['contra']));
  $candado = ' ';
  $str_u = strpos($usuario, $candado);
  $str_p = strpos($contra, $candado);

  if (is_int($str_u)) {
  $usuario = '';
  }else{
  $usuario2 = $usuario;
  }
  if (is_int($str_p)) {
  $contra = '';
  }else{
  $contra2 = md5($contra);
  }
//usuario2 and contra2

  if ($usuario2 == null && $contra2 == null) {
  header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
  }else{
          $sel = $conexion  ->query("SELECT idusuario,correo, password, nombre, nivel, bloqueo, imagen FROM usuario 
            WHERE correo = '$usuario2' AND password = '$contra2' AND bloqueo = 1 ");
  $row = mysqli_num_rows($sel);

  if ($row == 1) {

      if($var = $sel-> fetch_assoc() ){
            $idusuario = $var['idusuario'];
            $correo = $var['correo'];
            $contra = $var['password'];
            $nombre = $var['nombre'];
            $nivel = $var['nivel'];
            $bloqueo = $var['bloqueo'];
             $imagen = $var['imagen'];
           
        }

  if($correo == $usuario2 && $contra  == $contra2 && $nivel == 'ASISTENTE'){
         $_SESSION["idusuario"] = $idusuario; 
        $_SESSION["correo"] = $correo;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["nivel"] = $nivel;
        $_SESSION["bloqueo"] = $bloqueo;
        $_SESSION["imagen"] = $imagen;
        header('location:../view/cliente.php');
  }
  elseif($correo == $usuario2 && $contra == $contra2 && $nivel == 'ADMIN'){
         $_SESSION["idusuario"] = $idusuario; 
        $_SESSION["correo"] = $correo;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["nivel"] = $nivel;
        $_SESSION["bloqueo"] = $bloqueo;
         $_SESSION["imagen"] = $imagen;
        header('location:../view/usuario.php');
  }
  
  else  {
  header('location:../');
  }
  }else
  {
  header('location:../');
  }
  }
  // cierra method
  }else{
  header('location:../');
  }
  ?>